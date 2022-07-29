<?php 

    function readInput($array, $key, $validators = [])
    {
        if(isset($array[$key]) && $array[$key] != "")
        {
            return $array[$key];
        }
        
        return false;
    }

    function generateInsertQuery($table, $columns)
    {
        $sql = "INSERT INTO $table ";
        $columnsTemp = [];
        $valuesTemp = [];

        foreach($columns as $key => $value){
            $columnsTemp[] = $key;
            $valuesTemp[] = is_numeric($value) ? $value : "'$value'";
        }
        $sql .= "(".implode(",", $columnsTemp).") VALUES (".implode(',', $valuesTemp).")";

        return $sql;
    }

    function generateSelectQuery($table, $columns = ['*'], $conditions = [])
    {
        $columnsToSelect = implode(',', $columns);
        $sql = "SELECT $columnsToSelect FROM $table WHERE 1=1 ";
        
        foreach($conditions as $key => $value)
        {
            $sql .= " AND  $key = '$value' ";
        }

        return $sql;
    }

    //STATES CRUD


    function getStates(){
        global $db_conn;

        $sql = "SELECT * FROM states ORDER BY state_name";

        return mysqli_query($db_conn, $sql);
    }
    
    function getCompanies(){
        global $db_conn;

        $sql = "SELECT * FROM companies ORDER BY company_name";

        return mysqli_query($db_conn, $sql);
    }

    function getClasses(){
        global $db_conn;

        $sql = "SELECT * FROM classes ORDER BY class_name";

        return mysqli_query($db_conn, $sql);
    }

    function getModels(){
        global $db_conn;

        $sql = "SELECT * FROM models ORDER BY model_name";

        return mysqli_query($db_conn, $sql);
    }


    function saveStateToDatabase($state_name){
        
        global $db_conn;

        $sql = "INSERT INTO `states` (`state_name`) VALUES ('$state_name')";

        return mysqli_query($db_conn, $sql);
    }

    function deleteState($id){

        global $db_conn;

        $sql = "DELETE FROM states WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateState($state_name, $id){

        global $db_conn;
        
        $sql = "UPDATE states SET 
                state_name = '$state_name' 
                WHERE id = $id ";
        
        return mysqli_query($db_conn, $sql);
    }

    function findStateById($id){
        
        global $db_conn;

        $sql = "SELECT states.* 
                    FROM states 
                    WHERE states.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    //COMPANIES CRUD

    function saveCompanyToDatabase($company_name){
        global $db_conn;

        $sql = "INSERT INTO `companies` (`company_name`) VALUES ('$company_name')";

        return mysqli_query($db_conn, $sql);
    }

    function deleteCompany($id){

        global $db_conn;

        $sql = "DELETE FROM companies WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateCompany($company_name, $id){

        global $db_conn;
        
        $sql = "UPDATE companies SET 
                company_name = '$company_name' 
                WHERE id = $id ";
        
        return mysqli_query($db_conn, $sql);
    }

    function findCompanyById($id){
        
        global $db_conn;

        $sql = "SELECT companies.* 
                    FROM companies 
                    WHERE companies.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    //CLASSES CRUD

    function saveClassToDatabase($class_name){

        global $db_conn;

        $sql = "INSERT INTO `classes` (`class_name`) VALUES ('$class_name')";

        return mysqli_query($db_conn, $sql);
    }

    function deleteClass($id){

        global $db_conn;

        $sql = "DELETE FROM classes WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateClass($class_name, $id){

        global $db_conn;
        
        $sql = "UPDATE classes SET 
                class_name = '$class_name' 
                WHERE id = $id ";
        
        return mysqli_query($db_conn, $sql);
    }

    function findClassById($id){
        
        global $db_conn;

        $sql = "SELECT classes.* 
                    FROM classes 
                    WHERE classes.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    //CLIENTS CRUD

    function saveClientToDatabase($first_name, $last_name, $passport_number, $state_id){

        global $db_conn;

        $sql = "INSERT INTO `clients` (`first_name`, `last_name`, `state_id`, `passport_number`) 
                VALUES ('$first_name', '$last_name', '$passport_number', '$state_id')";

        // var_dump($sql);
        // exit();

        return mysqli_query($db_conn, $sql);
    }

    function deleteClient($id){

        global $db_conn;

        $sql = "DELETE FROM clients WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateClient($first_name, $last_name, $passport_number, $state_id, $id){

        global $db_conn;
        
        $sql = "UPDATE clients SET 
                first_name = '$first_name',
                last_name =  '$last_name',
                passport_number = '$passport_number',
                state_id =  '$state_id'
                WHERE id = $id ";
        
        return mysqli_query($db_conn, $sql);
    }

    function findClientById($id){
        
        global $db_conn;

        $sql = "SELECT clients.* 
                    FROM clients 
                    WHERE clients.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    //MODELS CRUD

    function saveModelToDatabase($model_name, $company_id){

        global $db_conn;

        $sql = "INSERT INTO `models` (`model_name`, `company_id`) 
                VALUES ('$model_name', '$company_id')";

        return mysqli_query($db_conn, $sql);
    }

    function deleteModel($id){

        global $db_conn;

        $sql = "DELETE FROM Models WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateModel($model_name, $company_id, $id){

        global $db_conn;
        
        $sql = "UPDATE models SET 
                model_name = '$model_name',
                company_id =  '$company_id'
                WHERE id = $id ";
        
        return mysqli_query($db_conn, $sql);
    }

    function findModelById($id){
        
        global $db_conn;

        $sql = "SELECT models.* 
                    FROM models 
                    WHERE models.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    //VEHICLES CRUD

    function saveVehicleToDatabase($registration_number, $company_id, $model_id, 
                                    $class_id, $production_year, $vehicle_image){

        global $db_conn;

        $sql = "INSERT INTO `vehicles` (`registration_number`, `company_id`, `model_id`,
                                        `class_id`,`production_year`, `vehicle_image`) 
                VALUES ('$registration_number', '$company_id', '$model_id', 
                                    '$class_id', '$production_year', '$vehicle_image')";

        // var_dump($sql);

        return mysqli_query($db_conn, $sql);
    }

    function deleteVehicles($id){

        global $db_conn;

        $sql = "DELETE FROM vehicles WHERE id = $id";

        return mysqli_query($db_conn, $sql);
    }

    function updateVehicles($registration_number, $company_id, $model_id, 
                            $class_id, $production_year,$image, $id){

        global $db_conn;
        
        $sql = "UPDATE vehicles SET 
                registration_number = '$registration_number',
                company_id =  '$company_id',
                model_id = '$model_id',
                class_id = '$class_id',
                production_year =  '$production_year',
                vehicle_image = '$image'
                WHERE id = $id ";
                
        
        return mysqli_query($db_conn, $sql);
    }

    function findVehicleByID($id){
        
        global $db_conn;

        $sql = "SELECT vehicles.* 
                    FROM vehicles 
                    WHERE vehicles.id = $id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
        
    }

    function uploadFile($allowed_extensions, $upload_dir){
        $profile_photo = uniqid();
        $tmp = explode('.', $_FILES['profile']['name']);
        $client_extension = end($tmp);

        if(!in_array($client_extension, $allowed_extensions)){
            exit("Plase insert an image!");
        }

        $profile_photo = $profile_photo.".".$client_extension;

        $tmp_path = $_FILES['profile']['tmp_name'];
        $new_photo_path = $upload_dir.$profile_photo;
         if(!copy($tmp_path, $new_photo_path)){
           exit("Please insert your image!");
            
         }

        return $new_photo_path;
    }

    function getModelsByCompany($company_id){
        
        global $db_conn;

        $sql = "SELECT * FROM models WHERE company_id = $company_id ORDER BY model_name";

        return mysqli_query($db_conn, $sql);
   
    }

    function getStartDates(){
        global $db_conn;
        $sql = "SELECT start_date from reservations";
        return mysqli_query($db_conn, $sql);
    }

    function getEndDates(){
        global $db_conn;
        $sql = "SELECT end_date from reservations";
        return mysqli_query($db_conn, $sql);
    }

    function getDatesByID($reservation_id){
        global $db_conn;
        $sql = "SELECT start_date, end_date from reservations WHERE id = $reservation_id";
        return mysqli_query($db_conn, $sql);
    }

    function getDates(){

        global $db_conn;
        $sql = "SELECT start_date, end_date from reservations";
        return mysqli_query($db_conn, $sql);
    }

    //RESERVATIONS CRUD

    function saveReservationToDatabase($client_id, $vehicle_id, 
                                    $start_date, $end_date, $price){

        global $db_conn;

        $sql = "INSERT INTO `reservations` (`client_id`, `vehicle_id`, 
                                        `start_date`,`end_date`, `price`) 
                VALUES ('$client_id', '$vehicle_id', '$start_date', '$end_date', '$price')";

        // var_dump($sql);

        return mysqli_query($db_conn, $sql);
    }

    function findReservationById($reservation_id){
        global $db_conn;

        $sql = "SELECT reservations.* 
        FROM reservations 
        WHERE reservations.id = $reservation_id;";

        $res = mysqli_query($db_conn, $sql);

        return mysqli_fetch_assoc($res);
    }

    function deleteReservation($reservation_id){
        global $db_conn;
        $sql = "UPDATE reservations SET 
        start_date = 'NULL',
        end_date =  'NULL'
        WHERE id = $reservation_id ";

        return mysqli_query($db_conn, $sql);
    }

    function updateReservation($client_id, $vehicle_id, 
    $start_date, $end_date, $price, $id){

        global $db_conn;
        
        $sql = "UPDATE reservations SET 
                client_id = '$client_id',
                vehicle_id =  '$vehicle_id',
                start_date = '$start_date',
                end_date = '$end_date',
                price = '$price'
                WHERE id = $id ";
                
        // var_dump($sql);
        // exit();
        return mysqli_query($db_conn, $sql);
    }

    function getClients(){
        global $db_conn;

        $sql = "SELECT * FROM clients ORDER BY first_name";

        return mysqli_query($db_conn, $sql);
    }

    
    function getVehicles(){
        
        global $db_conn;

        $sql = "SELECT vehicles.*, models.model_name
        FROM vehicles
        JOIN models ON models.id = vehicles.model_id;";

        return mysqli_query($db_conn, $sql);
    }




?>