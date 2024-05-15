<?php
// Include TCPDF library
require_once('tcpdf/tcpdf.php');

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loginid'])) {
    // Redirect the user back to the login page if not logged in
    header("Location: login.html");
    exit;
}

// Define language array
$l = array();

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the selected year from the URL parameter
$year = $_GET['year'];

// Get the logged-in user's ID
$loginid = $_SESSION['loginid'];

// Fetch user details from the login_details table
$user_sql = "SELECT * FROM login_details WHERE loginid = '$loginid'";
$user_result = $conn->query($user_sql);

// Create new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Faculty Report');
$pdf->SetSubject('Faculty Report');
$pdf->SetKeywords('TCPDF, PDF, faculty, report');

// Set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Report', PDF_HEADER_STRING);

// Set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// Set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// Set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// Set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', 'B', 20);

// Title
$pdf->Cell(0, 10, 'Faculty Report '.$year, 0, 1, 'C');

// Set font
$pdf->SetFont('helvetica', '', 12);

if ($user_result->num_rows > 0) {
    $user_row = $user_result->fetch_assoc();
    $userData = array(
        'Name' => $user_row['title'] ." ". $user_row['fname'] ." ". $user_row['lname'],
        'Designation' => $user_row['designation'],
        'Department' => $user_row['department'],
        'Highest Academic Qualification' => $user_row['highestqualification']
    );
    // Display user data in table
    $pdf->Ln();
    $pdf->SetFont('helvetica', 'B', 12);
    $pdf->Cell(0, 10, 'User Details', 0, 1);
    $pdf->SetFont('helvetica', '', 12);
    foreach ($userData as $key => $value) {
        $pdf->Cell(80, 10, $key, 0, 0);
        $pdf->Cell(0, 10, $value, 0, 1);
    }
} else {
    $pdf->Cell(0, 10, 'User details not found', 0, 1);
}

// Fetch data from the database and display in the PDF
$sql = "SELECT * FROM details WHERE year = '$year' AND loginid = '$loginid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $data = array(
            'Degree' => $row['q1_degree'],
            'Semester' => $row['q1_sem'],
            'Course' => $row['q1_course'],
            'Course Title' => $row['q1_course_title'],
            'Type' => $row['q1_type'],
            'Classes Taken' => $row['q1_classes_taken'],
            'Total Enrolment' => $row['q1_total_enrolment'],
            'Students Passed' => $row['q1_students_passed'],
            'Degree 2' => $row['q1_degree2'],
            'Semester 2' => $row['q1_sem2'],
            'Course 2' => $row['q1_course2'],
            'Course Title 2' => $row['q1_course_title2'],
            'Type 2' => $row['q1_type2'],
            'Classes Taken 2' => $row['q1_classes_taken2'],
            'Total Enrolment 2' => $row['q1_total_enrolment2'],
            'Students Passed 2' => $row['q1_students_passed2'],
            'Degree 3' => $row['q1_degree3'],
            'Semester 3' => $row['q1_sem3'],
            'Course 3' => $row['q1_course3'],
            'Course Title 3' => $row['q1_course_title3'],
            'Type 3' => $row['q1_type3'],
            'Classes Taken 3' => $row['q1_classes_taken3'],
            'Total Enrolment 3' => $row['q1_total_enrolment3'],
            'Students Passed 3' => $row['q1_students_passed3'],
            'Degree 4' => $row['q1_degree4'],
            'Semester 4' => $row['q1_sem4'],
            'Course 4' => $row['q1_course4'],
            'Course Title 4' => $row['q1_course_title4'],
            'Type 4' => $row['q1_type4'],
            'Classes Taken 4' => $row['q1_classes_taken4'],
            'Total Enrolment 4' => $row['q1_total_enrolment4'],
            'Students Passed 4' => $row['q1_students_passed4'],
            'Degree 5' => $row['q1_degree5'],
            'Semester 5' => $row['q1_sem5'],
            'Course 5' => $row['q1_course5'],
            'Course Title 5' => $row['q1_course_title5'],
            'Type 5' => $row['q1_type5'],
            'Classes Taken 5' => $row['q1_classes_taken5'],
            'Total Enrolment 5' => $row['q1_total_enrolment5'],
            'Students Passed 5' => $row['q1_students_passed5'],
            'Degree 6' => $row['q1_degree6'],
            'Semester 6' => $row['q1_sem6'],
            'Course 6' => $row['q1_course6'],
            'Course Title 6' => $row['q1_course_title6'],
            'Type 6' => $row['q1_type6'],
            'Classes Taken 6' => $row['q1_classes_taken6'],
            'Total Enrolment 6' => $row['q1_total_enrolment6'],
            'Students Passed 6' => $row['q1_students_passed6'],
            'Properties proposed for improving result of the student' =>$row['q2_properties'],
        'Errors found in examination related documents' =>$row['q3_posting_errors'],
        'Grievance against Marks given' => $row['q4_grievance'],
        'Teaching Plan prepared Before Commendment of semester with proofs' => $row['q5_teaching_plans'],
        'Activites conducted for Class Activity Component'  => $row['q6_activities'],
        'Slow and Fast Learners identified with proofs'  => $row['q7_identify_learners'],
        '*If Ideantified'  => $row['q7_strategies'],
        '*If not identified'  => $row['q7_reason'],
        'Stratergies for Mentor-Mentee Interaction'  => $row[ 'q7_mentor_interaction'],
        'No of meets with Mentee in academic year'  => $row[ 'q7_meeting_frequency'],
        'Remedial Classes Taken with proof'  => $row['q8_remedial_classes'],
        'Contribution in development of course material'  => $row['q9_contribution'],
        'E-Resources Used' => $row['q10_resources'],
        'AV Resources Used' => $row['q10_avresources'],
        'Journals/Magazines used' => $row['q10_journal'],
        'Any other resources used' => $row['q10_other'],
        'Any innovative Experiments/ Exercises introduced' => $row['q11_gap_bridging'],
        'Innovative practise adopted' => $row['q12_innovative_practices'],
        'Generated Awareness regarding library resouces with proofs' => $row['q13_library_awareness'],
        'Placement Guidence Provided' => $row['q14_placement_guidance'],
        'Placement Guidence Provided' => $row['q15_exam_guidance'],
        'Books, Journals and Websites referred to increase your professional competence' => $row['q16_books_journals'],
        'E-Resources subscribed by IISU Central Library Referred' => $row['q16_e_resources'],
        'Other resouces consulted' => $row['q17_other_sources'],
        ' E-Content developed for e-PG Pathshala, CEC/Undergraduated, SWAYAM, other MOOC platforms, NPTEL, NMEICT/ any other government imitative/institutional LMS' => $row['q17_e_content'],
        'Attendance marked regularly' => $row['q18_attendance'],
        'MS Teams for posting assignments, quiz, etc.' => $row['q18_ms_teams'],
        'E-Platform(s) used, predominantly, to conduct classes/ quizzes (besides Teams)' =>$row['q18_e_platforms'],
           'Sno' =>$row['q19_sno'],
        'Committee' =>$row['q19_committee'],
        'Formed by' =>$row['q19_formedby'],
        'Position' =>$row['q19_position'],
        'No of meetings' =>$row['q19_noofmeet'],
        'Contribution' =>$row['q19_contribution'],
        'Sno 2' =>$row['q19_sno2'],
        'Committee 2' =>$row['q19_committee2'],
        'Formed by 2' =>$row['q19_formedby2'],
        'Position 2' =>$row['q19_position2'],
        'No of meeting 2' =>$row['q19_noofmeet2'],
        'Contribution 2' =>$row['q19_contribution2'],
        'Sno 3' =>$row['q19_sno3'],
        'Committee 3' =>$row['q19_committee3'],
        'Formed by 3' =>$row['q19_formedby3'],
        'Position 3' =>$row['q19_position3'],
        'No of meeting 3' =>$row['q19_noofmeet3'],
        'Contribution 3' =>$row['q19_contribution3'],
        'Sno 4' =>$row['q19_sno4'],
        'Committee 4' =>$row['q19_committee4'],
        'Formed by 4' =>$row['q19_formedby4'],
        'Position 4' =>$row['q19_position4'],
        'No of meeting 4' =>$row['q19_noofmeet4'],
        'Contribution 4' =>$row['q19_contribution4'],
        'Sno 5' =>$row['q19_sno5'],
        'Committee 5' =>$row['q19_committee5'],
        'Formed by 5' =>$row['q19_formedby5'],
        'Position 5' =>$row['q19_position5'],
        'No of meeting 5' =>$row['q19_noofmeet5'],
        'Contribution 5' =>$row['q19_contribution5'],
        'Sno 6' =>$row['q19_sno6'],
        'Committee 6' =>$row['q19_committee6'],
        'Formed by 6'=>$row['q19_formedby6'],
        'Position 6' =>$row['q19_position6'],
        'No of meeting 6'=>$row['q19_noofmeet6'],
        'Contribution 6' =>$row['q19_contribution6'],
        'Prepared to share any additional responsibility for smooth functioning of the University' =>$row['q20_a'],
        'Prepared to share any additional responsibility for smooth functioning of the University' =>$row['q20_a2'],
        'If yes, what are your areas of interest' =>$row['q20_b'],
        'List of Major/Minor Projects Sanctioned/Applied For (Government/Non-Government)' =>$row['q21'],
        ' Consultancy Projects' =>$row['q22'],
        'IPR: Copyright/Trademark/Industrial designed Patent/ Technology-transfer/ Product/ Process' =>$row['q23'],
        ' Ph.D.:' =>$row['q24'],
        'M.Phil.:' =>$row['q25'],
        'Post-Doctoral Degree/ D.Sc./D. Lit. (Self)' =>$row['q26'],
        'National/International Fellowship/Financial Support by various agencies for advanced studies/research' =>$row['q27'],
        'Post-Doctoral work Supervised' =>$row['q28'],
        'PG Dissertations/ Projects Supervised' =>$row['q29'],
        'Publications in Indexed/Non-indexed Journals (Print/ e-journal) (attach first paper of publication)' =>$row['q30'],
        'Research Papers Published in Conference/ Seminar/ Workshop/ Symposium-Proceedings' =>$row['q31'],
        'Monographs' =>$row['q32'],
        ' Books Authored' =>$row['q33'],
        'Books Edited' =>$row['q34'],
        'Chapters in Edited Books' =>$row['q35'],
        'Serving on Editorial Board (Attach cover page of book of first page of chapter)' =>$row['q36'],
        'Editing of the Proceedings of Seminars/ Symposia/ Conferences/ Workshops, etc.' =>$row['q37'],
        'Peer Reviewing of Papers' =>$row['q38'],
        'Peer Reviewing of Project Proposals/Evaluation of Project-completion Report' =>$row['q39'],
        'Participation As Resource Person / Expert in Seminars/ Workshops/ Conferences/ Symposia (Attach copy of certificate)' =>$row['q40'],
        'Training Courses / Conferences /Seminars / Workshops/Symposiums Organized (As Coordinator / Convener / Organising Secretary) for strengthening the financial position of the institution' =>$row['q41'],
        'Papers Presented in Conferences /Seminars / Symposia'=>$row['q42'],
        'Seminars/ Workshops/ Conferences/ Symposia attended' =>$row['q43'],
        'List of FDPs attended' =>$row['q44'],
        'List of Refresher/ Orientation Courses/Short Term Courses attended' =>$row['q45'],
        'Academic Awards/ Honours/ Recognition' =>$row['q46'],
        'Interdisciplinary Research (Attach relevant document/proof)' =>$row['q47'],
        'Recognition from Professional Bodies/ Agencies (Attach relevant document/proof)' =>$row['q48'],
        'Collaborations & Linkages for Research/Academics' =>$row['q49'],
        'Extension Activities organized for the Community (other than NSS/ NCC/ Cultural / NEN activities)' =>$row['q50_a'],
        'No. of awards received from government recognized bodies in recognition of the extension activities carried out' =>$row['q50_b'],
        'Membership of Academic Bodies' =>$row['q51'],
        'Membership of Professional Bodies' =>$row['q52'], 
        'Casual Leave' =>$row['casual'],
        'Medical Leave' =>$row['medical'],
        'Academic Leave' =>$row['academic'],
        'Duty Leave' =>$row['duty'],
        'Other' =>$row['other'],
        'Permission seeked prior from the authorities before proceeding on leave' =>$row['permission'],
        'Reporting at the University on time' =>$row['timeperiod'],
        'Permission from the authorities in case of early departure' =>$row['early'],
        'Private tutions with details of students, classes and fees' =>$row['privatetution'],
        'Interpersonal relations students' =>$row['student'],
         'Interpersonal relations colleague' =>$row['colleague'],
         'Interpersonal relations HOD' =>$row['hod'],
         'Interpersonal relations dean' =>$row['dean'],
        'Served any letter for disciplinary action taken' =>$row['actiontaken'],
        'If yes, describe the matter and view point briefly' =>$row['pointofview'],
        'Specify the areas of your success and failures during the year' =>$row['success'],
        'Steps to improve upon your past achievements and guard against past failures' =>$row['achievement'],
        'Should be granted the annual increment? Justify.' =>$row['increment'],// Add other fields here
        );
        $pdf->Ln();
        $pdf->SetFont('helvetica', 'B', 12);
        $pdf->Cell(0, 10, 'Data Details', 0, 1);
        $pdf->SetFont('helvetica', '', 12);
        foreach ($data as $key => $value) {
            // Set maximum width for the cell
            $maxCellWidth = 60;
            // Calculate the width of the cell dynamically based on content length
            $cellWidth = strlen($key) > strlen($value) ? strlen($key) * 2 : strlen($value) * 2;
            // Split the content if it exceeds the maximum width
            if ($cellWidth > $maxCellWidth) {
                $valueParts = str_split($value, $maxCellWidth);
                foreach ($valueParts as $part) {
                    $pdf->Cell($maxCellWidth, 10, '', 0, 0); // Empty cell for alignment
                    $pdf->Cell(0, 10, $part, 0, 1);
                }
            } else {
                $pdf->Cell($maxCellWidth, 10, $key, 0, 0);
                $pdf->Cell(0, 10, $value, 0, 1);
            }
        }
    }
} else {
    $pdf->Cell(0, 10, 'No data found', 0, 1);
}
// ---------------------------------------------------------

// Close and output PDF document
$pdf->Output('faculty_report_'.$year.'.pdf', 'D');

// Close the database connection
$conn->close();
?>
