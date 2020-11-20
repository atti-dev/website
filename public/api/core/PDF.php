<?php

class PDF extends FPDF
{
    function Header()
    {
        $title = 'ATTI Student Enrolment Form';
        $author = 'ATTI';
        
        $this->SetTitle($title);
        $this->SetAuthor($author);
        $this->SetFont('Courier','B',18);
        $this->SetTextColor(69, 69, 69);
        $this->SetFillColor(255,255,255);
        if ($this->PageNo() == 1) {
            $logo = "logo.png";
            $image = $this->Image('logo.png',5,5,-180);
            $this->Cell(50, 0, $image, 0, 0, 'C' ,false);
            $this->Cell(0, 15, $title, 0, 1, 'C', true);
            $this->Ln(14);
        }
    }

    function newPage()
    {
        $this->AddPage();
        $this->SetFont('Courier','',12);
    }

    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-18);
        $this->SetFont('Courier','',9);
        $this->SetTextColor(128);
        $this->Cell(40, 5, 'ATTI Nelspruit', 0, 0, 'C',);
        $this->Cell(40, 5, '16 Rothery St', 0, 0, 'C',);
        $this->Cell(40, 5, 'Private Bag X 11284', 0, 0, 'C',);
        // $this->Cell(33, 5, '1200', 0, 0, 'L', true);
        $this->Cell(40, 5, 'Tel: 013 755 2638', 0, 0, 'C',);
        $this->Cell(40, 5, 'Code: 1200', 0, 1, 'C',);
        $this->SetFont('Courier','B',11);
        $this->SetY(-14);
        $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    }

    function ChapterTitle($num, $label)
    {
        // $this->AddPage();
        $this->SetFont('Courier','B',14);
        // $this->SetFillColor(227, 227, 227);
        $this->SetFillColor(255, 255, 255);
        $this->Cell(0, 13, "Part $num : $label", 0, 1, 'L', true);
        $this->Ln(0);
    }

    function createColumn($value, $fillUpdate = true, $lastColumn = true)
    {
        $width = $lastColumn == true? 0 : 50;
        $break = $lastColumn == true? 1 : 0;
        $fillUpdate ? $this->SetFillColor(255, 255, 255) :$this->SetFillColor(235, 235, 235);
        $this->Cell($width, 10, $value, 1, $break, 'L', true);
    }

    function officeUse()
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);
        $this->createColumn('Invoice No', false, false);
        $this->createColumn('', true, false);
        $this->createColumn('Student No', false, false);
        $this->createColumn('');
        $this->createColumn('Consultant', false, false);
        $this->createColumn('');
        $this->Ln(10);
    }

    function courseInformation($data)
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);
        $this->createColumn('Course', false, false);
        $this->createColumn($data['course']);
        $this->createColumn('Period', false, false);
        $this->createColumn($data['period']." Months");
        $this->createColumn('Start Date', false, false);
        $this->createColumn('02 march 2021', true, false);
        $this->createColumn('End Date', false, false);
        $this->createColumn('02 May 2022');
        $this->Ln(10);
    }

    function studentInformation($data)
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);

        $this->createColumn('Firstname', false, false);
        $this->createColumn($data['firstname']);
        $this->createColumn('Lastname', false, false);
        $this->createColumn($data['lastname']);
        $this->createColumn('ID Number', false, false);
        $this->createColumn($data['id_number']);
        $this->createColumn('Email', false, false);
        $this->createColumn($data['email']);
        $this->createColumn('Contact Number', false, false);
        $this->createColumn($data['contact_number']);
        $this->createColumn('Postal Address', false, false);
        $this->createColumn($data['postal_address']);
        $this->createColumn('', false, false);
        $this->createColumn($data['postal_city']);
        $this->createColumn('Code', false, false);
        $this->createColumn($data['postal_code']);
        $this->createColumn('Home Address', false, false);
        $this->createColumn($data['home_address']);
        $this->createColumn('', false, false);
        $this->createColumn($data['home_city']);
        $this->createColumn('Code', false, false);
        $this->createColumn($data['home_code']);
        $this->createColumn('Qualification', false, false);
        $this->createColumn($data['qualification_name']);
        // $this->createColumn('hey there im testing the full row: '.$data['firstname'] ,);

        $this->Ln(4);
    }

    function guardianInformation($data)
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);
        $this->createColumn('Surname', false, false);
        $this->createColumn($data['guardian_lastname']);
        $this->createColumn('Firstname', false, false);
        $this->createColumn($data['guardian_firstname']);
        $this->createColumn('Relationship', false, false);
        $this->createColumn($data['guardian_relation']);
        $this->createColumn('Contact Number', false, false);
        $this->createColumn($data['guardian_contact']);
        $this->Ln(10);
    }

    function companyInformation($data)
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);
        $this->createColumn('Initials', false, false);
        $this->createColumn($data['company_initials'], true, false);
        $this->createColumn('Surname', false, false);
        $this->createColumn($data['company_lastname']);

        $this->createColumn('Position', false, false);
        $this->createColumn($data['company_position'], true, false);
        $this->createColumn('Telephone', false, false);
        $this->createColumn($data['company_telephone']);

        $this->createColumn('Email', false, false);
        $this->createColumn($data['company_email']);
        $this->createColumn('Company REG No', false, false);
        $this->createColumn($data['company_reg_number']);
        $this->createColumn('Company VAT No', false, false);
        $this->createColumn($data['company_vat_number']);

        $this->createColumn('Postal Address', false, false);
        $this->createColumn($data['company_postal_address']);
        $this->createColumn('', false, false);
        $this->createColumn($data['company_postal_city']);
        $this->createColumn('Code', false, false);
        $this->createColumn($data['company_postal_code']);
        $this->createColumn('Pysical Address', false, false);
        $this->createColumn($data['company_physical_address']);
        $this->createColumn('', false, false);
        $this->createColumn($data['company_physical_city']);
        $this->createColumn('Code', false, false);
        $this->createColumn($data['company_physical_code']);
        
        $this->Ln(10);
    }

    function medicalInformation($data)
    {
        $this->SetFont('Courier','',12);
        $this->SetLineWidth(.05);
        // $this->SetDrawColor(150, 150, 150);
        $this->SetFillColor(255, 255, 255);
        $illness = $data['medical_illness'] ? 'Yes' : 'No';
        $this->createColumn('Medical Aid Scheme', false, false);
        $this->createColumn($data['medical_aid_scheme']);
        $this->createColumn('Member Number', false, false);
        $this->createColumn($data['medical_member_number']);
        $this->createColumn('Telephone No', false, false);
        $this->createColumn($data['medical_telephone']);
        $this->createColumn('Any illness', false, false);
        $this->createColumn($illness, true, false);
        $this->createColumn('if YES specify', false);
        $this->createColumn($data['medical_illness_description']);
        $this->Ln(4);
    }
}