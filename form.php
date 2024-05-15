<!DOCTYPE html>
<html>
 <head>
    <title>Form</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
 <style>
        body{
      background-color:#f0f6ff;
    }
    .sidenav {
  height: 550px;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-image: #cde9fa;
  padding-top: 100px;
  margin-left: 10px;
  margin-top: 15px;

  }

  .sidenav a {
   padding:  8px;
  padding-left: 5px;
  text-decoration: none;
  font-size: 25px;
  color: black;
  text-align: center;
  font-family: Helvetica;
  }


  table, th, td {
  font-size: 10px;
  border: 1px solid black;
  border-collapse: collapse;
  }
   .bor{
     border: none;
  }
 </style>
 </head>
 <body>
    <div class="header">
        <img src="logo.jpg" alt="university logo" width="70" height="70">
        <h2>IIS(Deemed to be University)</h2>
        <h5>Faculty Self Appraisal </h5>
    </div>
    <div class="sidenav" style="text-align: center;">
        <?php
        // Start the session
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['loginid'])) {
            // Redirect the user back to the login page if not logged in
            header("Location: login.html");
            exit;
        }

        // Database configuration
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "faculty";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $loginid = $_SESSION['loginid'];

        // Retrieve image data from the database
        $sql = "SELECT img FROM login_details WHERE loginid = '$loginid'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                // Display the image
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '" />';
            }
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
        <br><br><br>
        <a href="home.php">Home</a>
        <a href="profile.php">Profile</a>
        <a href="form.php">Form</a>
        <a href="report.php">Report</a>
    </div>
    <div class="content">
        <div class="box">
            <form method="post" action="">
                <p> Name of faculty members(Mr/Ms/Dr) :
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

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
                    }
                    $sql = "SELECT title, fname, lname FROM login_details WHERE loginid = '$loginid'";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo $row["title"] . ' ' . $row["fname"] . ' ' . $row["lname"];
                        }
                    } else {
                        echo "No records found.";
                    }

                    $conn->close();
                    ?>
                </p>
                <p> Present designation and department :
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

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
                    }
                    $sql = "SELECT  department, designation FROM login_details WHERE loginid = '$loginid'";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo $row["department"] . ", " . $row["designation"];
                        }
                    } else {
                        echo "No records found.";
                    }

                    $conn->close();
                    ?>
                </p>
                <p>Highest Qualification :
                    <?php
                    error_reporting(E_ALL);
                    ini_set('display_errors', 1);

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
                    }
                    $sql = "SELECT  highestqualification FROM login_details WHERE loginid = '$loginid'";

                    // Execute the query
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo $row["highestqualification"];
                        }
                    } else {
                        echo "No records found.";
                    }

                    $conn->close();
                    ?>
                </p>
            </form>
    </div>   
    <div class="form">
     <form method="post" action="saveyear.php">
      <label for="year" style="padding:20px;">Academic Year:
                                <select name="year" id="year">
                                    <option value="">--</option>
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                </select>
       </label>  
       <button type="submit">Save Year</button>
             
        <div class="accordion" id="accordionPanelsStayOpenExample">
           <div class="accordion-item">
             <h2 class="accordion-header">
               <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                 data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                   aria-controls="panelsStayOpen-collapseOne">
                   Syllabi, Teaching & Evaluation (Odd and Even Semesters)
               </button>
             </h2>
             <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse ">
              <div class="accordion-body">
                 <form method="post" action ="saveform.php">
                    <div class="button">
                        <button type="submit" class="button">Save</button>
                    </div>
                    <br><br>
                    <label><b>Q1.
                        <table style="width:30%">
                            <tr>
                                <th>Degree</th>
                                <th>Sem. /Section</th>
                                <th>Course</th>
                                <th>Course title taught </th>
                                <th>Type of Paper
                                    Theory /
                                    Practical
                                </th>
                                <th>Actual
                                    Classes
                                    Taken
                                    /Actual
                                    Allotted</th>
                                <th>Total
                                    enrolment/no of
                                    students
                                    In the class</th>

                                <th>Students
                                    passed in
                                    with credit</th>
                            </tr> 
                            <tr>
                                 <td><select name="i119" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i120"></td>
                                <td><input type="text" name="i121"></td>
                                <td><input type="text" name="i122"></td>
                                <td><input type="text" name="i123"></td>
                                <td><input type="number" name="i124"></td>
                                <td><input type="number" name="i125"></td>
                                <td><input type="number" name="i126"></td>
                            </tr> 
                            <tr>
                                <td><select name="i127" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i128"></td>
                                <td><input type="text" name="i129"></td>
                                <td><input type="text" name="i130"></td>
                                <td><input type="text" name="i131"></td>
                                <td><input type="number" name="i132"></td>
                                <td><input type="number" name="i133"></td>
                                <td><input type="number" name="i134"></td>
                            </tr>
                            <tr>
                                <td><select name="i135" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i136"></td>
                                <td><input type="text" name="i137"></td>
                                <td><input type="text" name="i138"></td>
                                <td><input type="text" name="i139"></td>
                                <td><input type="number" name="i140"></td>
                                <td><input type="number" name="i141"></td>
                                <td><input type="number" name="i142"></td>
                            </tr>
                            <tr>
                                <td><select name="i143" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i144"></td>
                                <td><input type="text" name="i145"></td>
                                <td><input type="text" name="i146"></td>
                                <td><input type="text" name="i147"></td>
                                <td><input type="number" name="i148"></td>
                                <td><input type="number" name="i149"></td>
                                <td><input type="number" name="i150"></td>
                            </tr>
                            <tr>
                                <td><select name="i151" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i152"></td>
                                <td><input type="text" name="i153"></td>
                                <td><input type="text" name="i154"></td>
                                <td><input type="text" name="i155"></td>
                                <td><input type="number" name="i156"></td>
                                <td><input type="number" name="i157"></td>
                                <td><input type="number" name="i158"></td>
                            </tr>
                            <tr>
                                <td><select name="i159" >
                                    <option value="">--</option>
                                    <option value="">UG</option>
                                    <option value="">PG</option>
                                    <option value="">COSD</option>
                                    <option value="">Others</option>
                                </select></td>
                                <td><input type="text" name="i160"></td>
                                <td><input type="text" name="i161"></td>
                                <td><input type="text" name="i162"></td>
                                <td><input type="text" name="i163"></td>
                                <td><input type="number" name="i164"></td>
                                <td><input type="number" name="i165"></td>
                                <td><input type="number" name="i166"></td>
                            </tr>

                        </table><br>  
                    </label><br>   
                    <label><b>Q2. What properties do you propose for improving the result of your 
                        student?</b>
			            <input type="text" size="50" name="i198">
                    </label><br><br>
                    <label><b>Q3. Were there any posting errors found in your C.A. Booklet/ OMRs/ 
                        Award Sheets or any other examinationrelated document? If yes, how many 
                        times in the last two semesters? Justify.
                        </b><input type="text" size="50" name="i199">
                    </label><br><br>
                    <label><b>Q4. Did you receive any grievance against the marks awarded by you 
                        in the Continuous Assessment Tests?
                        If yes, how did you resolve the same?</b><br>
                        <input type="text" size="50" name="i200">
                    </label><br><br>
                    <label><b>Q5. Do you prepare Teaching Plans before the commencement of the 
                        Semester and get those approvedby Head of
                        your Department? Yes/ No. If No, why? (Attach proofs)</b><br>
                        <input type="text" size="50" name="i201">
                    </label><br><br>
                    <label><b>Q6. What kind of activities do you conduct as part of the Class 
                        Activity component of CA?</b><br><b>
                        <input type="text" size="50" name="i202">
                    </label><br><br>
                    <label><b>Q7. (a) Do you identify Slow and Advanced learners in your class and 
                         mention them in your attendance register.
                        Yes/ No (Attach proofs)</b><br>
                        <input type="text" size="50" name="i203">
                    </label><br><br>
                    <label><b>*If yes, what specific strategic did you adopt for dealing with the 
                        slow and advance
                        learners in the class?</b><br>
                        <input type="text" size="50" name="i204">
                    </label><br><br>
                    <label><b>*If no, please explain the reason thereof?</b><br>
                        <input type="text" size="50" name="i205">
                    </label><br><br>
                    <label><b>(b) What strategies you follow for mentor-mentee interaction?/b><br>
                         <input type="text" size="50" name=i206>
                    </label><br><br>
                    <label><b>(c) How many times do you meet with your mentee in an academic year?</b><br>
                        <input type="text" size="50" name="i207">
                    </label><br><br>
                    <label><b>Q8. Did you mention Remedial Classes taken by you during the year in the Attendance Register?
                          (Attach proofs)</b><br>
                        <input type="text" size="50" name="i208">
                    </label><br><br>
                    <label><b>Q9. What is your contribution to the development of course-material or new courses? List
                          them.</b><br>
                        <input type="text" size="50" name="i209">
                    </label><br><br>
                    <label><b>Q10. What are the resources that you make use of to make your teaching interesting and learning
                        student-centric?</b><br>
                            <table style="width:30%">
                                <tr>
                                    <th><center>S.No. </center></th>
                                    <th><center>Type of Resources  </center></th>
                                    <th><center>Specification  </center></th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>ICT/E-Resources</td>
                                    <td><input type="text" name="i210"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Audio-Visual Resources</td>
                                    <td><input type="text" name="i211"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Journals/Magazines/Etc.</td>
                                    <td><input type="text" name="i212"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Any other</td>
                                    <td><input type="text" name="i213"></td>
                                </tr>
                            </table>
                    </label><br><br>
                    <label><b>Q11. In the practical sessions/classes, do you help students in bridging the gap between theory
                        and practice by
                        introducing any innovative experiments/exercises?</b><br>
                        <input type="text" size="50" name="i214">
                    </label><br><br>
                    <label><b>Q12. Did you adopt any innovative practice(s) this year to enhance teaching and learning? If yes,
                          please specify.</b><br>
                        <input type="text" size="50" name="i215">
                    </label><br><br>
                    <label><b>Q13. Do you generate awareness amongst students regarding the books/journals/e-resources
                          available in the
                        central library? If yes, mention a few instances.</b><br>
                        <input type="text" size="50" name="i216">
                    </label><br><br>
                    <label><b>Q14. How do you guide students to prepare themselves for Placements?</b><br>
                        <input type="text" size="50" name="i217">
                    </label><br><br>
                    <label><b>Q15. How do you guide students to prepare themselves for Placements?</b><br>
                        <input type="text" size="50" name="i218">
                    </label><br><br>
                    <label><b>Q16. (a) Which books, (other than the textbooks), journals and websites did you refer to during
                          the year of review to
                        increase your professional competence? List a few of them along with the source.</b><br>
                        <input type="text" size="50" name="i219">
                    </label><br><br>
                    <label><b>(b) Did you refer to e-resources subscribed by IISU Central Library. If yes, list a few of
                          them.</b><br>
                        <input type="text" size="50" name="i220">
                    </label><br><br>
                    <label><b>Q17. (a) Other sources of information consulted by you?</b><br>
                        <input type="text" size="50" name="i221">
                    </label><br><br>
                    <label><b>(b) E-Content developed for e-PG Pathshala, CEC/Undergraduated, SWAYAM, other MOOC
                         platforms, NPTEL, NMEICT/ any other government imitative/institutional LMS</b><br>
                        <input type="text" size="50" name="i222">
                    </label><br><br>
                    <label><b>Q18. (a) Do you mark attendance regularly in the Attendance Register?</b><br>
                        <input type="text" size="50" name="i223">
                    </label><br><br>
                    <label><b>(b) Do you make use of MS Teams for posting assignments, quiz, etc.?/b><br>
                          <input type="text" size="50" name="i224">
                    </label><br><br>
                    <label><b>(c) Which e-platform(s) did you use, predominantly, to conduct classes/ quizzes (besides
                        Teams)?
                        Google class and forms/b><br>
                        <input type="text" size="50" name="i225">
                    </label><br><br>
                 </form>
              </div>
             </div>
            </div> 
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                         Committee Work
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">     
                        <br>
                        <form method="post" action ="saveform2.php">
                            <div class="button">
                                <button type="submit" class="button">Save</button>
                            </div>
                            <br><br> 
                            <label>Q19. Enter Committee(s) Details:<br>
                                <div class="bor" >
                                    <table style="width:30%">
                                        <tr>
                                            <th>Formed by </th>
                                            <th>Position </th>
                                            <th>Type of committee</th>
                                        </tr>
                                        <tr>
                                            <td>University</td>
                                            <td> Nodal Officer</td>
                                            <td>Statutory</td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td> Convenor</td>
                                            <td>Standing</td>
                                        </tr>
                                        <tr>
                                            <td>Any Other</td>
                                            <td>Co-ordinator</td>
                                            <td> Adhoc</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Member</td>
                                            <td>Annual</td>
                                        </tr>
                                    </table><br>
                                </div>    
                                    <table style="width:30%">
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Name of the Committee</th>
                                            <th>Formed by </th>
                                            <th>Position</th>
                                            <th>Approx no. of
                                             meetings attended</th>
                                            <th>Your Contribution</th>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="i226"></td>
                                            <td><input type="text" name="i227"></td>
                                            <td><input type="text" name="i228"></td>
                                            <td><input type="text" name="i229"></td>
                                            <td><input type="text" name="i230"></td>
                                            <td><input type="text" name="i231"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="i232"></td>
                                            <td><input type="text" name="i233"></td>
                                            <td><input type="text" name="i234"></td>
                                            <td><input type="text" name="i235"></td>
                                            <td><input type="text" name="i236"></td>
                                            <td><input type="text" name="i237"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="i238"></td>
                                            <td><input type="text" name="i239"></td>
                                            <td><input type="text" name="i240"></td>
                                            <td><input type="text" name="i241"></td>
                                            <td><input type="text" name="i242"></td>
                                            <td><input type="text" name="i243"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" name="i244"></td>
                                            <td><input type="text" name="i245"></td>
                                            <td><input type="text" name="i246"></td>
                                            <td><input type="text" name="i247"></td>
                                            <td><input type="text" name="i248"></td>
                                            <td><input type="text" name="i249"></td>
                                        </tr>

                                        <tr>
                                            <td><input type="text" name="i250"></td>
                                            <td><input type="text" name="i251"></td>
                                            <td><input type="text" name="i252"></td>
                                            <td><input type="text" name="i253"></td>
                                            <td><input type="text" name="i254"></td>
                                            <td><input type="text" name="i255"></td>
                                        </tr>

                                        <tr>
                                            <td><input type="text" name="i256"></td>
                                            <td><input type="text" name="i257"></td>
                                            <td><input type="text" name="i258"></td>
                                            <td><input type="text" name="i259"></td>
                                            <td><input type="text" name="i260"></td>
                                            <td><input type="text" name="i261"></td>
                                        </tr>
                                    </table><br>
                            </label>
                            <label>Q20. Are you prepared to share any additional responsibility for smooth functioning of the
                                University?<br><br>
                                <input type="radio" value="Yes" name="i280">Yes
                                <input type="radio" value="No" name="i281">No
                            </label><br><br>
                            <label>If yes, what are your areas of interest? <br><br>
                                <input type="text" size="50" name="i282">
                            </label><br>
                        </form> 
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Research
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <form method="post" action ="saveform3.php">
                            <div class="button">
                                <button type="submit" class="button">Save</button>
                            </div> 
                            <br>
                            <b>1. Research Projects</b><br><br>
                                <label><b>Q21. List of Major/Minor Projects Sanctioned/Applied For (Government/Non-Government)</b><br>
                                    <input type="text" size="50" name="i283">
                                </label><br><br>
                                <label><b>Q22. Consultancy Projects</b><br>
                                    <input type="text" size="50" name="i284">
                                </label><br><br>
                                <label><b>Q23. IPR: Copyright/Trademark/Industrial designed Patent/ Technology-transfer/ Product/
                                    Process</b><br>
                                    <input type="text" size="50" name="i285">
                                </label><br><br>  
                            <b>2. Research-guidance</b><br><br>
                                <label><b>Q24. Ph.D.:</b><br>
                                 <input type="text" size="50" name="i286">
                                </label><br><br>
                                <label><b>Q25. M.Phil.:</b><br>
                                    <input type="text" size="50" name="i287">
                                </label><br><br>
                                <label><b>Q26. Post-Doctoral Degree/ D.Sc./D. Lit. (Self)</b><br>
                                    <input type="text" size="50" name="i288">
                                </label><br><br>
                                <label><b>Q27. National/International Fellowship/Financial Support by various agencies for advanced
                                    studies/research
                                    </b><br>
                                    <input type="text" size="50" name="i289">
                                </label><br><br>
                                <label><b>Q28. Post-Doctoral work Supervised</b><br>
                                    <input type="text" size="50" name="i290">
                                </label><br><br>
                                <label><b>Q29. PG Dissertations/ Projects Supervised</b><br>
                                    <input type="text" size="50" name="i291">
                                </label><br><br>
                            <b>3. Publications </b><br><br>
                                <label><b>Q30. Publications in Indexed/Non-indexed Journals (Print/ e-journal) (attach first paper of
                                    publication)</b><br>
                                    <input type="text" size="50" name="i292">
                                </label><br><br>
                                <label><b> Q31. Research Papers Published in Conference/ Seminar/ Workshop/ Symposium-Proceedings
                                    </b><br>
                                    <input type="text" size="50" name="i293">
                                </label><br><br>
                                <label><b> Q32. Monographs</b><br>
                                    <input type="text" size="50" name="i294">
                                </label><br><br>
                                <label><b>Q33. Books Authored</b><br>
                                    <input type="text" size="50" name="i295">
                                </label><br><br>
                                <label><b>Q34. Books Edited</b><br>
                                    <input type="text" size="50" name="i296">
                                </label><br><br>
                                <label><b>Q35. Chapters in Edited Books</b><br>
                                     <input type="text" size="50" name="i297">
                                </label><br><br>
                                <label><b>Q36. Serving on Editorial Board (Attach cover page of book of first page of chapter)</b><br>
                                    <input type="text" size="50" name="i298">
                                </label><br><br>
                                <label><b>Q37. Editing of the Proceedings of Seminars/ Symposia/ Conferences/ Workshops, etc.</b><br>
                                    <input type="text" size="50" name="i299">
                                </label><br><br>
                                <label><b>Q38. Peer Reviewing of Papers</b><br>
                                    <input type="text" size="50" name="i300">
                                </label><br><br>
                                <label><b>Q39. Peer Reviewing of Project Proposals/Evaluation of Project-completion Report</b><br>
                                    <input type="text" size="50" name="i301">
                                </label><br><br>
                            <b>4. Participation/ Presentation in Conferences, etc.</b><br><br>
                                <label><b>Q40. As Resource Person / Expert in Seminars/ Workshops/ Conferences/ Symposia (Attach copy of
                                    certificate) </b><br>
                                    <input type="text" size="50" name="i302">
                                </label><br><br>
                                <label><b>Q41. Training Courses / Conferences /Seminars / Workshops/Symposiums Organized (As Coordinator
                                    / Convener / Organising Secretary)<br> for strengthening the financial position of the institution:
                                    </b><br>
                                    <input type="text" size="50" name="i303">
                                </label><br><br>
                                <label><b>Q42. Papers Presented in Conferences /Seminars / Symposia </b><br>
                                    <input type="text" size="50" name="i304">
                                </label><br><br>
                                <label><b>Q43. Seminars/ Workshops/ Conferences/ Symposia attended </b><br>
                                    <input type="text" size="50" name="i305">
                                </label><br><br>
                                <label><b>Q44. List of FDPs attended </b><br>
                                    <input type="text" size="50" name="i306">
                                </label><br><br>
                                <label><b>Q45. List of Refresher/ Orientation Courses/Short Term Courses attended</b><br>
                                    <input type="text" size="50" name="i307">
                                </label><br><br>
                                <label><b>Q46. Academic Awards/ Honours/ Recognition</b><br>
                                    <input type="text" size="50" name="i308">
                                </label><br><br>
                            <b>5. Others</b><br><br>
                                <label><b>Q47. Interdisciplinary Research (Attach relevant document/proof)</b><br>
                                    <input type="text" size="50" name="i309">
                                </label><br><br>
                                <label><b>Q48. Recognition from Professional Bodies/ Agencies (Attach relevant document/proof)</b><br>
                                    <input type="text" size="50" name="i310">
                                </label><br><br>
                                <label><b>Q49. Collaborations & Linkages for Research/Academics</b><br>
                                    <input type="text" size="50" name="i311">
                                </label><br><br>
                                <label><b>Q50. (a)Extension Activities organized for the Community (other than NSS/ NCC/ Cultural / NEN
                                    activities) </b><br>
                                    <input type="text" size="50" name="i312">
                                </label><br><br>
                                <label><b>(b)No. of awards received from government recognized bodies in recognition of the
                                    extension activities carried out</b><br>
                                    <input type="text" size="50" name="i313">
                                </label><br><br>
                                <label><b>Q51. Membership of Academic Bodies</b><br>
                                    <input type="text" size="50" name="i314">
                                </label><br><br>
                                <label><b>Q52 Membership of Professional Bodies</b><br>
                                    <input type="text" size="50" name="i315">
                                </label><br><br>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour">
                        Miscellaneous
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                    <div class="accordion-body">
                    <form method="post" action ="saveform4.php">
                            <div class="button">
                                <button type="submit" class="button">Save</button>
                            </div>
                            <label>Leaves availed during the year <br>
                                <ul>
                                    <li>Casual: <input type="text" size="50" name="i316">
                                    </li><br>
                                    <li>Medical : <input type="text" size="50" name="i317"></li><br>
                                    <li>Academic : <input type="text" size="50" name="i318"></li><br>
                                    <li>Duty : <input type="text" size="50" name="i319"></li><br>
                                    <li>Any other : <input type="text" size="50" name="i320"></li><br>
                                </ul>
                            </label>
                            <label> <b> Do you seek prior permission from the authorities before proceeding on leave?<br>
                                <input type="text" size=130 name="i321">
                            </label><br><br>
                            <label> <b> Do you report at the University on time? (Yes/ No / Sometimes - No.) <br>
                                <input type="text" size=130 name="i322">
                            </label><br><br>
                            <label> <b> Do you seek permission from the authorities in case of early departure? <br>
                                <input type="text" size=130 name="i323">
                            </label><br><br>
                            <label><b> Do you offer private tuitions?<br>
                                If yes, give details of the students, classes and the fee being charged?<br>
                                    <input type="text" size=130 name="i324">
                            </label><br><br>
                            <label><b> What kind of interpersonal relations do you have with: <br>
                                <ol type="a">
                                    <li>Students? &nbsp &nbsp &nbsp <input type="text" size=130 name="i325"></li>
                                    <li>Colleagues? &nbsp<input type="text" size=130 name="i326"></li>
                                    <li>H.O.D.? &nbsp &nbsp &nbsp &nbsp <input type="text" size=130 name="i327"></li>
                                    <li>Deans? &nbsp &nbsp &nbsp &nbsp <input type="text" size=130 name="i328"></li>
                                </ol> 
                            </label><br>
                            <br><br>
                            <label> <b> Have you been served any letter asking you to explain yourself or has any disciplinary
                                action been taken
                                against you during the current academic year? <br>Yes/No <br>
                                <input type="text" size=130 name="i329">
                            </label><br><br>
                            <label>If yes, describe the matter and your view-point in brief.<br>
                                <input type="text" size=130 name="i330">
                            </label><br><br>
                            <label><b> Specify the areas of your success and failures during the year: </b><br>
                                <input type="text" size=130 name="i331">
                            </label><br><br>
                            <label><b> What steps do you plan to take to improve upon your past achievements and guard against
                                past failures? </b><br>
                                <input type="text" size=130 name="i332">
                            </label><br><br>
                            <label><b> Do you feel you should be granted the annual increment? Justify.</b><br>
                                <input type="text" size=130 name="i333">
                            </label><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
     </form>  
    </div>
    <div class="footer">
        <p>Copyright &copy; 2023-2024 by IIS Deemed to be University. All Rights Reserved.</p>
    </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js"
   integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g=="
   crossorigin="anonymous" referrerpolicy="no-referrer">
  </script>
 </body>  
</html> 