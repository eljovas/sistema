    <?php
    $mysqli = new mysqli("internal-db.s75015.gridserver.com", "db75015_dermato", "drizabalweb", "db75015_sistema");
     
    // check connection
    if ($mysqli->connect_errno){
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
    }
     
    $query = 'SELECT id,nombre_completo FROM clients';
     
    if(isset($_POST['query'])){
    // Add validation and sanitization on $_POST['query'] here
     
    // Now set the WHERE clause with LIKE query
    $query .= ' WHERE nombre_completo LIKE "%'.$_POST['query'].'%" AND sucursal='.$_POST['sucursal'];
    //$query .= ' WHERE nombre LIKE "%'.$_POST['query'].'%" OR apellido LIKE "%'.$_POST['query'].'%"';
    }
     
    $return = array();
     
    if($result = $mysqli->query($query)){
    // fetch object array
    while($obj = $result->fetch_object()) {
        $id       = $obj->id;
        $nombre_completo   = $obj->nombre_completo;
        //$apellido = $obj->apellido;
        $todo_junto =  array('id'=>$obj->id,'name'=>$nombre_completo);
        $return[] = $todo_junto;
    }
    // free result set $obj->nombre
    $result->close();
    }
     
    // close connection
    $mysqli->close();
     
    $json = json_encode($return);
    print_r($json);
    ?>