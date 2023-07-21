<?php
class ModelCatalogExtensionModule extends Model {
    
public function addSearchQuery($search_query) {
    $this->createSearchLogTable();
        // Prevent duplicates before inserting
    existingQuery = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "search_log WHERE search_query = '" . $this->db->escape($search_query) . "'")->row['total'];

    if (!$existingQuery&&(mb_strlen($search_query) > 4)) {
        $this->db->query("INSERT IGNORE INTO " . DB_PREFIX . "search_log (search_query, search_date, hits) VALUES ('" . $this->db->escape($searchQuery) . "', NOW(), 1) ON DUPLICATE KEY UPDATE hits = hits + 1");
   
    }
}

public function addClickedValueToSearchQuery($clickedValue) {
    $this->db->query("UPDATE " . DB_PREFIX . "search_log SET clicked_value = '" . $this->db->escape($clickedValue) . "' WHERE id = (SELECT MAX(id) FROM " . DB_PREFIX . "search_log)");
}
    private function createSearchLogTable() {
        $sql = "
        CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "search_log (
            id INT(11) NOT NULL AUTO_INCREMENT,
            search_query VARCHAR(255) NOT NULL,
            search_date DATE NOT NULL,
            hits INT(11) NOT NULL DEFAULT 0,
            clicked_value VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY (id),
            UNIQUE KEY (search_query)
        ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
    ";

        $this->db->query($sql);
    }
}


///


$this->load->model('catalog/searchlog');
$this->model_catalog_searchlog->addSearchQuery($search_query);
    
//

<!-- Assuming you have a function to handle search results and append them to the search div -->
function showSearchResults(results) {
  // Create the ul element and append the li elements (search results)
  var ulElement = document.createElement('ul');
  ulElement.classList.add('search-results');

  for (var i = 0; i < results.length; i++) {
    var liElement = document.createElement('li');
    liElement.textContent = results[i];
    ulElement.appendChild(liElement);
  }

  // Add the ul element to the search div
  var searchDiv = document.getElementById('search-div');
  searchDiv.innerHTML = '';
  searchDiv.appendChild(ulElement);
}

// Event delegation for click events on li elements
document.addEventListener('click', function(event) {
  var clickedElement = event.target;
  
  // Check if the clicked element is an li element within the ul with class 'search-results'
  if (clickedElement.tagName === 'LI' && clickedElement.closest('.search-results')) {
    var clickedText = clickedElement.textContent;
    // Do something with the clicked text (e.g., perform the search or display it in a textbox)
    console.log('User clicked:', clickedText);
  }
});


///


// Assuming you have a function to handle search results and append them to the search div
function showSearchResults(results) {
    // Create the ul element and append the li elements (search results)
    var ulElement = document.createElement('ul');
    ulElement.classList.add('search-results');
  
    for (var i = 0; i < results.length; i++) {
      var liElement = document.createElement('li');
      liElement.textContent = results[i];
      ulElement.appendChild(liElement);
    }
  
    // Add the ul element to the search div
    var searchDiv = document.getElementById('search-div');
    searchDiv.innerHTML = '';
    searchDiv.appendChild(ulElement);
  }
  
  // Event delegation for click events on li elements
  document.addEventListener('click', function(event) {
    var clickedElement = event.target;
  
    // Check if the clicked element is an li element within the ul with class 'search-results'
    if (clickedElement.tagName === 'LI' && clickedElement.closest('.search-results')) {
      var clickedText = clickedElement.textContent;
      // Do something with the clicked text (e.g., perform the search or display it in a textbox)
      console.log('User clicked:', clickedText);
  
      // Send the clicked value to the server using AJAX
      var xhr = new XMLHttpRequest();
      var url = 'index.php?route=product/searchlog/logClickedValue';
      var params = 'clicked_value=' + encodeURIComponent(clickedText);
      xhr.open('POST', url, true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          console.log(xhr.responseText);
        }
      };
      xhr.send(params);
    }
  });
  
