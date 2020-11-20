<?php

class ContactController
{
    public function create()
	{
        $validation = $this->validateCreateInputs($_POST);
        if ($validation !== true) {
            echo json_encode($validation);
            http_response_code(203);
        }
        else {
            $query = "INSERT INTO web_messages (fullname, email, contact_number, message) VALUES(:fullname, :email, :contact_number, :message)";
            $params = [
                ':fullname' => $_POST['fullname'],
                ':email' => $_POST['email'],
                ':contact_number' => $_POST['contact_number'],
                ':message' => $_POST['message']
            ];
            DB::query($query, $params);
            echo json_encode(['message' => 'Thank you! Your message have been sent successfuly']);
            http_response_code(201);
        }
    }

    private function validateCreateInputs($data)
    {
        if (empty($data['fullname'])) {
            return ['message' => 'Please enter your fullname'];
        }
        
        if (!$data['email']) {
            if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                return ['message' => 'Please enter a valid Email Address'];
            }
        }
    
        $filtered_phone_number = filter_var($data['contact_number'], FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) < 9 || strlen($phone_to_check) > 11) {
            return ['message' => 'Please enter a valid Contact Number'];
        }

        if (strlen($data['message']) < 10) {
            return ['message' => 'Please enter your message'];
        }
    
        return true;
    }
}