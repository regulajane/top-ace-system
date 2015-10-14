<?php
  try {
    include '../includes/header.php';

    if(!isset($_SESSION["username"])) {
      header('Location: ../index.php?loggedout=true');}

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $where ="1=1";
    $order_by="cllastname asc";
    $rows=25;
    $current=1;
    $limit_l=($current * $rows) - ($rows);
    $limit_h=$limit_l + $rows  ;

    //Sort
    if (isset($_REQUEST['sort']) && is_array($_REQUEST['sort']) )
      {
        $order_by="";
        foreach($_REQUEST['sort'] as $key=> $value)
        $order_by.=" $key $value";
      }
    //Search 
    if (isset($_REQUEST['searchPhrase']) )
      {
        $search=trim($_REQUEST['searchPhrase']);
        $where.= " AND ( cllastname LIKE '%".$search."%' OR  
                    clfirstname LIKE '%".$search."%' OR 
                    clmidinitial LIKE '%".$search."%' OR
                    clcelno LIKE '%".$search."%' OR
                    clgender LIKE '%".$search."%' OR
                    claddress LIKE '%".$search."%' OR
                    clsince LIKE '%".$search."%') "; 
      }
    //Row Count
    if (isset($_REQUEST['rowCount']) )  
      $rows=$_REQUEST['rowCount'];
    //Low and High Limits
    if (isset($_REQUEST['current']) )  
      {
        $current=$_REQUEST['current'];
        $limit_l=($current * $rows) - ($rows);
        $limit_h=$rows ;
      }
    if ($rows==-1)
      $limit="";  //no limit
    else   
      $limit=" LIMIT $limit_l,$limit_h ";
       
    //Query (Warning: Prone to SQL injection.)
    $sql="SELECT * from clients
            WHERE $where 
            ORDER BY $order_by $limit";
    $stmt=$conn->prepare($sql);
    $stmt->execute();
    $results_array=$stmt->fetchAll(PDO::FETCH_ASSOC);
    $json=json_encode( $results_array );
    $nRows=$conn->query("SELECT count(*) from clients
                          WHERE $where")->fetchColumn();
    header('Content-Type: application/json');
    //JSON
    if (isset($_REQUEST['rowCount']) )
      echo "{ \"current\":  $current, \"rowCount\":$rows,  \"rows\": ".$json.", \"total\": $nRows }";
    else
      echo $json;
    exit;
  }
    catch(PDOException $e) {
      echo 'SQL PDO ERROR: ' . $e->getMessage();
  }
?>