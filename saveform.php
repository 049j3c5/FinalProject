<?php
// Start the session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    if(isset($_POST['year'])) {
        // Set the year in session
        $_SESSION['year'] = $_POST['year'];
    }
}

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Faculty";
$tablename = "login_details";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}// Retrieve form data
    $year = $_SESSION['year'];
    $q1_degree =$_POST['i119'];
    $q1_sem=$_POST['i120'];
    $q1_course=$_POST['i121'];
    $q1_course_title=$_POST['i122'];
    $q1_type=$_POST['i123'];
    $q1_classes_taken=$_POST['i124'];
    $q1_total_enrolment=$_POST['i125'];
    $q1_students_passed=$_POST['i126'];

    $q1_degree2 =$_POST['i127'];
    $q1_sem2=$_POST['i128'];
    $q1_course2=$_POST['i129'];
    $q1_course_title2=$_POST['i130'];
    $q1_type2=$_POST['i131'];
    $q1_classes_taken2=$_POST['i132'];
    $q1_total_enrolment2=$_POST['i133'];
    $q1_students_passed2=$_POST['i134'];

    $q1_degree3 =$_POST['i135'];
    $q1_sem3=$_POST['i136'];
    $q1_course3=$_POST['i137'];
    $q1_course_title3=$_POST['i138'];
    $q1_type3=$_POST['i139'];
    $q1_classes_taken3=$_POST['i140'];
    $q1_total_enrolment3=$_POST['i141'];
    $q1_students_passed3=$_POST['i142'];

    $q1_degree4 =$_POST['i143'];
    $q1_sem4=$_POST['i144'];
    $q1_course4=$_POST['i145'];
    $q1_course_title4=$_POST['i146'];
    $q1_type4=$_POST['i147'];
    $q1_classes_taken4=$_POST['i148'];
    $q1_total_enrolment4=$_POST['i149'];
    $q1_students_passed4=$_POST['i150'];

    $q1_degree5 =$_POST['i151'];
    $q1_sem5=$_POST['i152'];
    $q1_course5=$_POST['i153'];
    $q1_course_title5=$_POST['i154'];
    $q1_type5=$_POST['i155'];
    $q1_classes_taken5=$_POST['i156'];
    $q1_total_enrolment5=$_POST['i157'];
    $q1_students_passed5=$_POST['i158'];

    $q1_degree6 =$_POST['i159'];
    $q1_sem6=$_POST['i160'];
    $q1_course6=$_POST['i161'];
    $q1_course_title6=$_POST['i162'];
    $q1_type6=$_POST['i163'];
    $q1_classes_taken6=$_POST['i164'];
    $q1_total_enrolment6=$_POST['i165'];
    $q1_students_passed6=$_POST['i166'];


    $q2_properties=$_POST['i198'];
    $q3_posting_errors=$_POST['i199'];
    $q4_grievance=$_POST['i200'];
    $q5_teaching_plans=$_POST['i201'];
    $q6_activities=$_POST['i202'];
    $q7_identify_learners=$_POST['i203'];
    $q7_strategies=$_POST['i204'];
    $q7_reason=$_POST['i205'];
    $q7_mentor_interaction=$_POST['i206'];
    $q7_meeting_frequency=$_POST['i207'];
    $q8_remedial_classes=$_POST['i208'];
    $q9_contribution=$_POST['i209'];
    $q10_resources=$_POST['i210'];
    $q10_avresources=$_POST['i211'];
    $q10_journal=$_POST['i212'];
    $q10_other=$_POST['i213'];
    $q11_gap_bridging=$_POST['i214'];
    $q12_innovative_practices=$_POST['i215'];
    $q13_library_awareness=$_POST['i216'];
    $q14_placement_guidance=$_POST['i217'];
    $q15_exam_guidance=$_POST['i218'];
    $q16_books_journals=$_POST['i219'];
    $q16_e_resources=$_POST['i220'];
    $q17_other_sources=$_POST['i221'];
    $q17_e_content=$_POST['i222'];
    $q18_attendance=$_POST['i223'];
    $q18_ms_teams=$_POST['i224']; 
    $q18_e_platforms=$_POST['i225'];

    $sql = "UPDATE details 
    SET q1_degree = '$q1_degree',
        q1_sem = '$q1_sem',
        q1_course = '$q1_course',
        q1_course_title = '$q1_course_title',
        q1_type = '$q1_type',
        q1_classes_taken = '$q1_classes_taken',
        q1_total_enrolment = '$q1_total_enrolment',
        q1_students_passed = '$q1_students_passed',
        q1_degree2 = '$q1_degree2',
        q1_sem2 = '$q1_sem2',
        q1_course2 = '$q1_course2',
        q1_course_title2 = '$q1_course_title2',
        q1_type2 = '$q1_type2',
        q1_classes_taken2 = '$q1_classes_taken2',
        q1_total_enrolment2 = '$q1_total_enrolment2',
        q1_students_passed2 = '$q1_students_passed2',
        q1_degree3 = '$q1_degree3',
        q1_sem3 = '$q1_sem3',
        q1_course3 = '$q1_course3',
        q1_course_title3 = '$q1_course_title3',
        q1_type3 = '$q1_type3',
        q1_classes_taken3 = '$q1_classes_taken3',
        q1_total_enrolment3 = '$q1_total_enrolment3',
        q1_students_passed3 = '$q1_students_passed3',
        q1_degree4 = '$q1_degree4',
        q1_sem4 = '$q1_sem4',
        q1_course4 = '$q1_course4',
        q1_course_title4 = '$q1_course_title4',
        q1_type4 = '$q1_type4',
        q1_classes_taken4 = '$q1_classes_taken4',
        q1_total_enrolment4 = '$q1_total_enrolment4',
        q1_students_passed4 = '$q1_students_passed4',
        q1_degree5 = '$q1_degree5',
        q1_sem5 = '$q1_sem5',
        q1_course5 = '$q1_course5',
        q1_course_title5 = '$q1_course_title5',
        q1_type5 = '$q1_type5',
        q1_classes_taken5 = '$q1_classes_taken5',
        q1_total_enrolment5 = '$q1_total_enrolment5',
        q1_students_passed5 = '$q1_students_passed5',
        q1_degree6 = '$q1_degree6',
        q1_sem6 = '$q1_sem6',
        q1_course6 = '$q1_course6',
        q1_course_title6 = '$q1_course_title6',
        q1_type6 = '$q1_type6',
        q1_classes_taken6 = '$q1_classes_taken6',
        q1_total_enrolment6 = '$q1_total_enrolment6',
        q1_students_passed6 = '$q1_students_passed6',
        q2_properties = '$q2_properties',
        q3_posting_errors = '$q3_posting_errors',
        q4_grievance = '$q4_grievance',
        q5_teaching_plans = '$q5_teaching_plans',
        q6_activities = '$q6_activities',
        q7_identify_learners = '$q7_identify_learners',
        q7_strategies = '$q7_strategies',
        q7_reason = '$q7_reason',
        q7_mentor_interaction = '$q7_mentor_interaction',
        q7_meeting_frequency = '$q7_meeting_frequency',
        q8_remedial_classes = '$q8_remedial_classes',
        q9_contribution = '$q9_contribution',
        q10_resources = '$q10_resources',
        q10_avresources = '$q10_avresources',
        q10_journal = '$q10_journal',
        q10_other = '$q10_other',
        q11_gap_bridging = '$q11_gap_bridging',
        q12_innovative_practices = '$q12_innovative_practices',
        q13_library_awareness = '$q13_library_awareness',
        q14_placement_guidance = '$q14_placement_guidance',
        q15_exam_guidance = '$q15_exam_guidance',
        q16_books_journals = '$q16_books_journals',
        q16_e_resources = '$q16_e_resources',
        q17_other_sources = '$q17_other_sources',
        q17_e_content = '$q17_e_content',
        q18_attendance = '$q18_attendance',
        q18_ms_teams = '$q18_ms_teams',
        q18_e_platforms = '$q18_e_platforms'
    WHERE year = '$year'";

if ($conn->query($sql) === TRUE) {
  header("Location: form.php");
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>