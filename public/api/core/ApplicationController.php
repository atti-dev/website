<?php

class ApplicationController
{
    
    public function show($id_number, $course_id)
	{
		$query = "SELECT * FROM applications WHERE id_number=:id_number AND course_id=:course_id LIMIT 1";
        $data = DB::query($query, [':id_number' => $id_number, ':course_id' => $course_id]);
        if (empty($data)) {
            echo json_encode(['message' => 'Application does not exixts']);
        }
        else {
            echo json_encode($data[0]);
        }
    }

    public function download($id)
	{
        // Get the application Form
		$query = "SELECT * FROM applications WHERE id=:id";
        $application = DB::query($query, [':id' => $id]);

        // Get Course by Course_id from Applications
        $course_id = $application[0]['course_id'];
        $query = "SELECT * FROM courses WHERE id=:course_id";
        $course = DB::query($query, [':course_id' => $course_id]);

        // Get Student Registration Data from Registration by id_number form Applications
        $id_number = $application[0]['id_number'];
        $query = "SELECT * FROM registrations WHERE id_number=:id_number";
        $student = DB::query($query, [':id_number' => $id_number]);
        $data = [
            'course' => $course[0],
            'student' => $student[0]
        ];
        $pdf = new PDF();
        $pdf->newPage();
        $pdf->ChapterTitle('A', 'For Office Use Olny');
        $pdf->officeUse();

        $pdf->ChapterTitle('B', 'Course Information');
        $pdf->courseInformation($data['course']);

        $pdf->ChapterTitle('C', 'Student Information');
        $pdf->studentInformation($data['student']);

        $pdf->newPage();
        $pdf->ChapterTitle('D', 'Parent or Guardian Information');
        $pdf->guardianInformation($data['student']);

        $pdf->ChapterTitle('E', 'Company Information (if applicable)');
        $pdf->companyInformation($data['student']);

        $pdf->ChapterTitle('F', 'Medical Information (if applicable)');
        $pdf->medicalInformation($data['student']);

        $pdf->Output('enrolmentForm.pdf', 'I');/** D == Download, I == Web View */
	}
    
    public function create()
	{
        $validation = $this->validateCreateInputs($_POST);
        if ($validation !== true) {
            echo json_encode($validation);
            http_response_code(203);
        }
        else
        {
            $data_check = "SELECT id, pending FROM applications WHERE id_number=:id_number AND course_id=:course_id";
            $exists = DB::query($data_check, [
                ':id_number' => $_POST['id_number'],
                ':course_id' => $_POST['course_id']
            ]);
            if ($exists) {
                if ($exists[0]['pending'] == false) {
                    echo json_encode(['message' => 'You have applied and completed application for this course']);
                    http_response_code(203);
                }
                echo json_encode(["message" => "Aready Applied For this Course!"]);
                http_response_code(203);
            }
            else {
                $query = "INSERT INTO applications (course_id, firstname, lastname, id_number, contact_number, email)
                        VALUES(:course_id, :firstname, :lastname, :id_number, :contact_number, :email)";
                $params = [
                    ':course_id' => $_POST['course_id'],
                    ':firstname' => $_POST['firstname'],
                    ':lastname' => $_POST['lastname'],
                    ':id_number' => $_POST['id_number'],
                    ':email' => $_POST['email'],
                    ':contact_number' => $_POST['contact_number'],
                ];
                // var_dump($params);
                DB::query($query, $params);
                echo json_encode(["message" => "Applications Sent Successfuly!"]);
                http_response_code(201);
            }
        }
    }
    
    private function validateCreateInputs($data)
    {
        if (!$data['course_id']) {
            return ['message' => 'Please Choose a Course!'];
        }
        if (!$data['firstname'] || !$data['lastname']) {
            return ['message' => 'all fields are required!'];
        }
        if (strlen($data['id_number']) != 13) {
            return ['message' => 'Please enter a valid ID Number'];
        }
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            return ['message' => 'Please enter a valid Email Address'];
        }
        
        $filtered_phone_number = filter_var($data['contact_number'], FILTER_SANITIZE_NUMBER_INT);
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return ['message' => 'Please enter a valid Phone Number'];
        }
        return true;
    }
}