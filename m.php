<?php
class ModelCatalogExtensionModule extends Model {
    
public function addSearchQuery($search_query) {
    $this->createSearchLogTable();
        // Prevent duplicates before inserting
    existingQuery = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "search_log WHERE search_query = '" . $this->db->escape($search_query) . "'")->row['total'];

    if (!$existingQuery) {
        $today = date('Y-m-d');
        $this->db->query("INSERT INTO " . DB_PREFIX . "search_log (search_query, search_date, hits) VALUES ('" . $this->db->escape($searchQuery) . "', '" . $today . "', 1) ON DUPLICATE KEY UPDATE hits = hits + 1");

    }
}
    private function createSearchLogTable() {
        $sql = "
            CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "search_log (
                id INT(11) NOT NULL AUTO_INCREMENT,
                search_query VARCHAR(255) NOT NULL,
                search_date DATE NOT NULL,
                hits INT(11) NOT NULL DEFAULT 0,
                PRIMARY KEY (id),
                UNIQUE KEY (search_query, search_date)
            ) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
        ";

        $this->db->query($sql);
    }
}


///


$this->load->model('catalog/searchlog');
$this->model_catalog_searchlog->addSearchQuery($search_query);
    
