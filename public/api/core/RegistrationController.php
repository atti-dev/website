<?php
class RegistrationController
{
    public function create()
    {
        $validation = $this->validateCreateInputs($_POST);
        if ($validation !== true) {
            echo json_encode($validation);
            http_response_code(203);
        }
        else {
            $data_check = "SELECT id, firstname FROM registrations WHERE id_number=:id_number";
            $exists = DB::query($data_check, [':id_number' => $_POST['id_number']]);
            if (count($exists) == 0) {
                $query = "INSERT INTO registrations 
                    (
                        firstname,
                        lastname,
                        email,
                        contact_number,
                        id_number,
                        home_address,
                        home_city,
                        home_code,
                        postal_address,
                        postal_city,
                        postal_code,
                        qualification_name,
                        qualification_doc,
                        id_copy,
                        is_foreign,
                        guardian_firstname,
                        guardian_lastname,
                        guardian_relation,
                        guardian_contact
                    )
                    VALUES
                    (
                        :firstname,
                        :lastname,
                        :email,
                        :contact_number,
                        :id_number,
                        :home_address,
                        :home_city,
                        :home_code,
                        :postal_address,
                        :postal_city,
                        :postal_code,
                        :qualification_name,
                        :qualification_doc,
                        :id_copy,
                        :is_foreign,
                        :guardian_firstname,
                        :guardian_lastname,
                        :guardian_relation,
                        :guardian_contact
                    )";
                // Params
                $params = [
                    ':firstname' => $_POST['firstname'],
                    ':lastname' => $_POST['lastname'],
                    ':email' => $_POST['email'],
                    ':contact_number' => $_POST['contact_number'],
                    ':id_number' => $_POST['id_number'],
                    ':home_address' => $_POST['home_address'],
                    ':home_city' => $_POST['home_city'],
                    ':home_code' => $_POST['home_code'],
                    ':postal_address' => $_POST['postal_address'],
                    ':postal_city' => $_POST['postal_city'],
                    ':postal_code' => $_POST['postal_code'],
                    ':qualification_name' => $_POST['qualification_name'],
                    ':qualification_doc' => $_POST['qualification_doc'],
                    ':id_copy' => $_POST['id_copy'],
                    ':is_foreign' => $_POST['is_foreign'],
                    ':guardian_firstname' => $_POST['guardian_firstname'],
                    ':guardian_lastname' => $_POST['guardian_lastname'],
                    ':guardian_relation' => $_POST['guardian_relation'],
                    ':guardian_contact' => $_POST['guardian_contact'],
                ];
        
                DB::query($query, $params);
                echo json_encode(["message" => "New Student Registerd Successfuly!"]);
                http_response_code(201);
            }
            else {
                echo json_encode(["message" => "Already registered as a Student"]);
                http_response_code(203);
            }
        }
    }

    private function validateCreateInputs($data)
    {
        if (
            empty($data['firstname']) || 
            empty($data['lastname']) ||
            empty($data['id_number']) || 
            empty($data['home_address']) ||
            empty($data['home_city']) ||
            empty($data['home_code']) ||
            empty($data['qualification_name']) ||
            empty($data['qualification_doc']) ||
            empty($data['id_copy']) ||
            empty($data['is_foreign']) ||
            empty($data['guardian_firstname']) ||
            empty($data['guardian_lastname']) ||
            empty($data['guardian_relation']) ||
            empty($data['guardian_contact'])
            )
        {
            // Return Status message code 203, that require user to fillin all fields
            return ['message' => 'Please fill in the missing fields'];
        }
    
        if (strlen($data['id_number']) != 13) {
            return ['message' => 'Somthing Went Wrong with your ID Number It is in Invalid'];
        }
    
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['message' => 'Please enter a valid Email Address'];
        }

        $filtered_phone_number = filter_var($data['contact_number'], FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return ['message' => 'Please enter a valid Phone Number'];
        }

        $filtered_phone_number = filter_var($data['guardian_contact'], FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return ['message' => 'Please enter a valid guardian Phone Number'];
        }

        return true;
    }

    public function update($id_number)
    {
        $validation = $this->validateUpdateInputs($_POST);
        if ($validation !== true) {
            echo json_encode($validation);
            http_response_code(203);
        }
        else {
            $query =  "UPDATE registrations SET 
                company_initials = :company_initials,
                company_lastname = :company_lastname,
                company_position = :company_position,
                company_email = :company_email,
                company_telephone = :company_telephone,
                company_reg_number = :company_reg_number,
                company_vat_number = :company_vat_number,
                company_postal_address = :company_postal_address,
                company_postal_city = :company_postal_city,
                company_postal_code = :company_postal_code,
                company_physical_address = :company_physical_address,
                company_physical_city = :company_physical_city,
                company_physical_code = :company_physical_code,
                medical_aid_scheme = :medical_aid_scheme,
                medical_member_number = :medical_member_number,
                medical_telephone = :medical_telephone,
                medical_illness = :medical_illness,
                medical_illness_description = :medical_illness_description
            WHERE id_number=$id_number";
            // Dynamic Parameters
            $params = [
                ':company_initials' => $_POST['company_initials'],
                ':company_lastname' => $_POST['company_lastname'],
                ':company_position' => $_POST['company_position'],
                ':company_email' => $_POST['company_email'],
                ':company_telephone' => $_POST['company_telephone'],
                ':company_reg_number' => $_POST['company_reg_number'],
                ':company_vat_number' => $_POST['company_vat_number'],
                ':company_postal_address' => $_POST['company_postal_address'],
                ':company_postal_city' => $_POST['company_postal_city'],
                ':company_postal_code' => $_POST['company_postal_code'],
                ':company_physical_address' => $_POST['company_physical_address'],
                ':company_physical_city' => $_POST['company_physical_city'],
                ':company_physical_code' => $_POST['company_physical_code'],
                ':medical_aid_scheme' => $_POST['medical_aid_scheme'],
                ':medical_member_number' => $_POST['medical_member_number'],
                ':medical_telephone' => $_POST['medical_telephone'],
                ':medical_illness' => $_POST['medical_illness'],
                ':medical_illness_description' => $_POST['medical_illness_description']
            ];
            DB::query($query, $params);
            echo json_encode(["message" => "Student Updated Successfuly!"]);
            http_response_code(200);
        }
    }

    private function validateUpdateInputs($data)
    {
        if ($data['company_initials'] || $data['company_lastname'] || $data['company_position']) {
            if (
                empty($data['company_initials']) ||
                empty($data['company_lastname']) ||
                empty($data['company_position']) ||
                empty($data['company_email']) ||
                empty($data['company_telephone']) ||
                empty($data['company_reg_number']) ||
                empty($data['company_vat_number']) ||
                empty($data['company_physical_address']) ||
                empty($data['company_physical_city']) ||
                empty($data['company_physical_code'])
            ) {
                return ['message' => 'You Have Filled In Company Details, Please Complete'];
            }
        }

        if ($data['medical_aid_scheme'] || $data['medical_member_number']) {
            if (
                empty($data['medical_aid_scheme']) ||
                empty($data['medical_member_number']) ||
                empty($data['medical_illness'])
            ) {
                return ['message' => 'You Have Filled Some Medical Information. Please Complete'];
            }

            $filtered_phone_number = filter_var($data['medical_telephone'], FILTER_SANITIZE_NUMBER_INT);
            $phone_to_check = str_replace("-", "", $filtered_phone_number);
            if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
                return ['message' => 'Please enter a valid Medical Contact Number not: '.$data['medical_telephone']];
            }
        }
        
        return true;
    }

    // Upload Student Document ID, Qualification and Permit if Foreign
    public function fileUpload()
    {
        if (isset($_FILES['pdf_file']))
        {
            $file_name = $_FILES['pdf_file']['name'];
            $file_size = $_FILES['pdf_file']['size'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
            $file_type = $_FILES['pdf_file']['type'];

            // $file_extention = strtolower(end(explode('.',$_FILES['pdf_file']['name'])));
            $extract_extention = explode('.',strtolower($_FILES['pdf_file']['name']));
            $index = count($extract_extention) - 1;
            $file_extention = $extract_extention[$index];
            $allowed= array("application/pdf", 'pdf');
        
            if(!in_array($file_extention, $allowed)){
                echo json_encode(['message' => 'extension not allowed, please choose a PDF file']);
                http_response_code(203);
            }
            else 
            {
                if($file_size > 2097152) {
                    echo json_encode(['message' => 'File size must be less than 2MB']);
                    http_response_code(203);
                }
                else {
                    move_uploaded_file($file_tmp, "uploads/".$_POST['document'].'.'.$file_extention);
                    echo json_encode([
                        'message' => 'File Upload Success',
                        'url' => "uploads/".$_POST['document'].'.'.$file_extention
                    ]);
                    http_response_code(200);
                }
            }
        }
        else {
            echo json_encode(['message' => 'Sorry Something went wrong when uploading file']);
            http_response_code(203);
        }        
    }
}