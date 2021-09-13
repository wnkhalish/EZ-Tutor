<?php
require_once("php/header.php");
require_once("php/dbconfig.php");

if (!isset($_SESSION['userid'])) {
	session_destroy();
header('Location: index.php');
}

$id = $_SESSION['userid'];

?>
<script type="text/javascript">
function getSubject(val) {
	$.ajax({
	type: "POST",
	url: "get_subject.php",
	data:'lID='+val,
	success: function(data){
		$("#subject-list").html(data);
	}
	});
}
</script>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>EZ Tutor</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/plugin.css">
    <link rel="stylesheet" type="text/css" href="css/login4.css">
    <link rel="stylesheet" type="text/css" href="css/style4.css">
    <style>

    </style>

</head>

<body>
<br>
<h3 align="center" style="color:black;">FILL UP YOUR DETAILS</h3>
    <div class="list-request">
      </div><br><br>
    <section class="white-bg section-padding-bottom">
        <div class="section-header section-margin-top">

            <div class="form">
                <ul class="tabs">
                    <li><a class="tablinks" onclick="openTab(event, 'Profile')" class="active">Add Subject</a></li>
                </ul>

                <div id="Profile" class="tabcontentsubject show">
                    <form action="addnewsubject.php" method="POST">
                      <label for='user'>Level</label>
					  <select name="level-list" id="level-list" onChange="getSubject(this.value);" class="minimal" required>
                        <option selected="" value="Default">Select Level</option>
                        <?php
						$sql = "SELECT * FROM level";
						$result = $conn->query($sql);
						while ($rs = $result->fetch_assoc()){
							?>
							<option value="<?php echo $rs["lID"]; ?>"><?php echo $rs["lname"]; ?></option>
							<?php
						}
						?>
                      </select>
                      <label for='user'>Subject</label>
                      <select name="subject-list" id="subject-list" class="minimal" required>
                        <option selected="" value="Default">Select Subject</option>
                      </select>


                      <div class="row">
                          <div class="col-75">
                              <div class="row">
                                  <div class="col-50">
                                      <label for="user">Rate Per Hour</label>
                                      <input type='text' id='umail' name='cprice' placeholder="RM" /required>
                                  </div>

                              </div>

                              <label for="user">Prefered Time</label>
                              <div class="calendar">
                                  <div class="header2">
                                      <div>time</div>
                                      <div>mon</div>
                                      <div>tue</div>
                                      <div>wed</div>
                                      <div>thu</div>
                                      <div>fri</div>
                                      <div>sat</div>
                                      <div>sun</div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>9:00</span>am</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="1">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="14">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="27">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="40">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="53">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="66">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="79">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>10:00</span>am</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="2">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="15">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="28">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="41">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="54">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="67">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="80">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>11:00</span>am</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="3">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="16">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="29">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="42">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="55">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="68">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="81">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>12:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="4">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="17">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="30">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="43">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="56">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="69">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="82">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>1:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="5">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="18">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="31">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="44">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="57">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="70">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="83">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>2:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="6">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="19">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="32">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="45">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="58">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="71">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="84">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>3:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="7">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="20">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="33">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="46">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="59">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="72">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="85">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>4:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="8">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="21">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="34">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="47">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="60">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="73">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="86">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>5:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="9">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="22">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="35">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="48">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="61">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="74">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="87">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>6:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="10">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="23">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="36">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="49">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="62">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="75">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="88">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>7:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="11">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="24">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="37">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="50">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="63">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="76">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="89">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>8:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="12">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="25">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="38">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="51">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="64">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="77">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="90">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
                                  <div class="week">
                                      <div class="day"><span>9:00</span>pm</div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="13">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                        <div class="day"><label class="containerC">
                                            <input type="checkbox" name="Days[]" value="26">
                                            <span class="checkmarkk"></span>
                                          </label></div>
                                          <div class="day"><label class="containerC">
                                              <input type="checkbox" name="Days[]" value="39">
                                              <span class="checkmarkk"></span>
                                            </label></div>
                                            <div class="day"><label class="containerC">
                                                <input type="checkbox" name="Days[]" value="52">
                                                <span class="checkmarkk"></span>
                                              </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="65">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="78">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                      <div class="day"><label class="containerC">
                                          <input type="checkbox" name="Days[]" value="91">
                                          <span class="checkmarkk"></span>
                                        </label></div>
                                  </div>
								  <br>
                              </div>
							  <br>
                              <input type="submit" value="Submit" class="button" />
                          </div>
                      </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent2, tablinks;
            tabcontent2 = document.getElementsByClassName("tabcontent2");
            for (i = 0; i < tabcontent2.length; i++) {
                tabcontent2[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
	  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>

  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>

    <script src="js/index.js"></script>

</body>

</html>
