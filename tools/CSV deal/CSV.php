public function insert_csv_data() {
   $this->load->database('postgresql', TRUE);

   if (($handle = fopen("data.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
         $this->db->insert('table_name', array(
            'column1' => $data[0],
            'column2' => $data[1],
            'column3' => $data[2],
            // Ajouter les autres colonnes
         ));
      }
      fclose($handle);
   }
}
