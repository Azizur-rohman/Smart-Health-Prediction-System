<?php  
session_start();
if (!isset($_SESSION['Email'])) {
  header('location:patientlogin.php');
}



?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
	<title>HeartDisease</title>
	<link rel="shortcut icon" type="image/png" href="Image/ninjaapple.png">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<style>

@import"css/heartdiseasemodify.css"

</style>
</head>
<body>

 <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fa fa-bars" id="closedetails"></i>
      </label>
      <label class="logo">HEALTH CARE</label>
      <ul class="ul">
          <div class="deta">
              
             
            <?php 
     $host = "localhost";
    $dbUsername = "Your username";
    $dbPassword = "";
    $dbname = "Your databasename";
    //create connection
    $conn = new mysqli($host,$dbUsername, $dbPassword, $dbname);
$email = $_SESSION['Email'];
$query = "SELECT `FirstName`, `LastName`, `Email`, `phoneCode`, `phone`, `gender`, `File` FROM register WHERE Email = '$email'";
$result = $conn->query($query);
        

        $row = $result->fetch_assoc();
 $firstname = $row['FirstName'];
$lastname = $row['LastName'];
$email = $row['Email'];
$phoneCode = $row['phoneCode'];
$phone = $row['phone'];
$gender = $row['gender'];
$files = $row['File'];      
?>

 <button class="profile-btn"><img src="Patientphotos/<?php print_r($files); ?>" class="file1" ></button> <br><br>
      <p class="tap">Tap to picture show your info</p>
 <div class="details1-panel-container">
              <div class="details1-panel">
                  <div  class="details1">
  <b class="name1">Name:</b> <b class="fatchname1"><?php print_r($firstname);?></b>&nbsp<b class="fatchname1"><?php print_r($lastname); ?></b><br>
  <b class="name1">Email:</b> <b class="fatchname1"><?php print_r($email); ?></b><br>
  <b class="name1">PhoneCode:</b> <b class="fatchname1"><?php print_r($phoneCode); ?></b><br>
  <b class="name1">Phone:</b> <b class="fatchname1"><?php print_r($phone); ?></b><br>
  <b class="name1">Gender:</b> <b class="fatchname1"><?php print_r($gender); ?></b><br>
      





    </div> 
     </div>
     </div>
       </div>    
        <li class="l"><a  href="patientpage.php">Dashboard</a></li>
        
         <li class="dropdown" id="dropdown1">
        <a class="active" id="dropbtn"  >Search Disease
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content">
        <a href="heartdisease.php" class="active" >Heart Disease</a>
        <a href="livercancer.php">Liver Cancer</a>
        <a href="patientcovidinfo.php">Covid-19 info</a>
        </div>
        </li>
        <li class="dropdown1" id="dropdown2">
        <a class="dropbtn1">Communication
        <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-content1">
        <a href="patientalldoctorsinfo.php" >All Doctors Info</a>
        <a href="patientcommwithdoctors.php">Communicate with doctors</a>
        </div>
        </li>
        <li class="l"><a href="patientfeedback.php">Feedback</a></li>
        <li class="l"><a href="patientlogout.php">Logout</a></li>
      </ul>
    </nav>

<center><h2 >Heart Disease Prediction</h2></center>
      
    <form id="regForm"method="POST" action="heartdisease.php">
  
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><b>Choose Your Age:</b>
  
  <select id="Age" name="Age" style="width: 100px;font-family: sans-serif">
    <option value="29">29</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="37">37</option>
    <option value="38">38</option>
    <option value="39">39</option>
    <option value="40">40</option>
    <option value="41">41</option>
    <option value="42">42</option>
    <option value="43">43</option>
    <option value="44">44</option>
    <option value="45">45</option>
    <option value="46">46</option>
    <option value="47">47</option>
    <option value="48">48</option>
    <option value="49">49</option>
    <option value="50">50</option>
    <option value="51">51</option>
    <option value="52">52</option>
    <option value="53">53</option>
    <option value="54">54</option>
    <option value="55">55</option>
    <option value="56">56</option>
    <option value="57">57</option>
    <option value="58">58</option>
    <option value="59">59</option>
    <option value="60">60</option>
    <option value="61">61</option>
    <option value="62">62</option>
    <option value="63">63</option>
    <option value="64">64</option>
    <option value="65">65</option>
    <option value="66">66</option>
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="74">74</option>
    <option value="76">76</option>
    <option value="77">77</option>
  </select>

 


  </div>
  <div class="tab">



     <label for="gender"><b>Choose a Gender:</b></label></br>
  <select id="Sex" name="Sex" style="width: 100px;font-family: sans-serif">
    <option value="0">Female</option>
    <option value="1">Male</option>
    <option value="2">Other</option>
  </select>


    
  </div>
  <div class="tab">
    <label for="Chest_pain"><b>Choose Chest pain type:</b></label>
  <select id="Chest_pain_type" name="Chest_pain_type" style="width: 100px;font-family: sans-serif">
    <option value="0">Typical Angina</option>
    <option value="1">Atypical Angina</option>
    <option value="2">Non-Anginal  Pain</option>
    <option value="3">Asymptomatic</option>
  </select>
  </div>
  <div class="tab">
      <label for="BP"><b>Choose Blood Pressure(BP):</b></label>
  <select id="BP" name="BP" style="width: 100px;font-family: sans-serif">
   <option value="94">94</option>
    <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="108">108</option>
    <option value="110">110</option>
    <option value="112">112</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="120">120</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
    <option value="132">132</option>
    <option value="134">134</option>
    <option value="135">135</option>
    <option value="136">136</option>
    <option value="138">138</option>
    <option value="140">140</option>
    <option value="142">142</option>
    <option value="144">144</option>
    <option value="145">145</option>
    <option value="146">146</option>
    <option value="148">148</option>
    <option value="150">150</option>
    <option value="152">152</option>
    <option value="154">154</option>
    <option value="155">155</option>
    <option value="156">156</option>
    <option value="160">160</option>
    <option value="164">160</option>
    <option value="165">165</option>
    <option value="170">170</option>
    <option value="172">172</option>
    <option value="174">174</option>
    <option value="178">178</option>
    <option value="180">180</option>
    <option value="192">192</option>
    <option value="200">200</option>
  </select>
  </div>
  <div class="tab">
    <label for="Cholesterol"><b>Choose Cholesterol:</b></label>
  <select id="Cholesterol" name="Cholesterol" style="width: 100px;font-family: sans-serif">
   <option value="126">126</option>
   <option value="131">131</option>
    <option value="141">141</option>
    <option value="149">149</option>
    <option value="157">157</option>
    <option value="160">160</option>
    <option value="164">164</option>
    <option value="166">166</option>
    <option value="167">167</option>
    <option value="168">168</option>
    <option value="169">169</option>
    <option value="172">172</option>
    <option value="174">174</option>
    <option value="175">175</option>
    <option value="176">176</option>
    <option value="177">177</option>
    <option value="178">178</option>
    <option value="180">180</option>
    <option value="182">182</option>
    <option value="183">183</option>
    <option value="184">184</option>
    <option value="185">185</option>
    <option value="186">186</option>
     <option value="187">187</option>
    <option value="188">188</option>
    <option value="192">192</option>
    <option value="193">193</option>
    <option value="195">195</option>
    <option value="196">196</option>
    <option value="197">197</option>
    <option value="198">198</option>
    <option value="199">199</option>
    <option value="200">200</option>
    <option value="201">201</option>
    <option value="203">203</option>
    <option value="204">204</option>
    <option value="205">205</option>
    <option value="206">206</option>
    <option value="207">207</option>
    <option value="208">208</option>
    <option value="209">209</option>
    <option value="210">210</option>
    <option value="211">211</option>
    <option value="212">212</option>
    <option value="213">213</option>
    <option value="214">214</option>
    <option value="215">215</option>
    <option value="216">216</option>
    <option value="217">217</option>
    <option value="218">218</option>
    <option value="219">219</option>
    <option value="220">220</option>
    <option value="221">221</option>
    <option value="222">222</option>
    <option value="223">223</option>
    <option value="224">224</option>
    <option value="225">225</option>
    <option value="226">226</option>
    <option value="227">227</option>
    <option value="228">228</option>
    <option value="229">229</option>
    <option value="230">230</option>
    <option value="231">231</option>
    <option value="232">232</option>
    <option value="233">233</option>
    <option value="234">234</option>
    <option value="235">235</option>
    <option value="236">236</option>
    <option value="237">237</option>
    <option value="239">239</option>
    <option value="240">240</option>
    <option value="241">241</option>
    <option value="242">242</option>
    <option value="243">243</option>
    <option value="244">244</option>
    <option value="245">245</option>
    <option value="246">246</option>
    <option value="247">247</option>
    <option value="248">248</option>
    <option value="249">249</option>
    <option value="250">250</option>
    <option value="252">252</option>
    <option value="253">253</option>
    <option value="254">254</option>
    <option value="255">255</option>
    <option value="256">256</option>
    <option value="257">257</option>
    <option value="258">258</option>
    <option value="259">259</option>
    <option value="260">260</option>
    <option value="261">261</option>
    <option value="262">262</option>
    <option value="263">263</option>
    <option value="264">264</option>
    <option value="265">265</option>
    <option value="266">266</option>
    <option value="267">267</option>
    <option value="268">268</option>
    <option value="269">269</option>
    <option value="270">270</option>
    <option value="271">271</option>
    <option value="273">273</option>
    <option value="274">274</option>
    <option value="275">275</option>
    <option value="276">276</option>
    <option value="277">277</option>
    <option value="278">278</option>
    <option value="281">281</option>
    <option value="282">282</option>
    <option value="283">283</option>
    <option value="284">284</option>
    <option value="286">286</option>
    <option value="288">288</option>
    <option value="289">289</option>
    <option value="290">290</option>
    <option value="293">293</option>
    <option value="294">294</option>
    <option value="295">295</option>
    <option value="298">298</option>
    <option value="299">299</option>
    <option value="300">300</option>
    <option value="302">302</option>
    <option value="303">303</option>
    <option value="304">304</option>
    <option value="305">305</option>
    <option value="306">306</option>
    <option value="307">307</option>
    <option value="308">308</option>
    <option value="309">309</option>
    <option value="311">311</option>
    <option value="313">313</option>
    <option value="315">315</option>
    <option value="318">318</option>
    <option value="319">319</option>
    <option value="321">321</option>
    <option value="322">322</option>
    <option value="325">325</option>
    <option value="326">326</option>
    <option value="327">327</option>
    <option value="330">330</option>
    <option value="335">335</option>
    <option value="340">340</option>
    <option value="341">341</option>
    <option value="342">342</option>
    <option value="353">353</option>
    <option value="354">354</option>
    <option value="360">360</option>
    <option value="394">394</option>
    <option value="407">407</option>
    <option value="409">409</option>
    <option value="417">417</option>
    <option value="564">564</option>
  </select>
  </div>
  <div class="tab">
   <label for="FBS"><b>Choose Fasting Blood Sugar(FBS) over 120:</b></label></br>
  <select id="FBS_over_120" name="FBS_over_120" style="width: 100px;font-family: sans-serif;">
    <option value="0">No</option>
    <option value="1">Yes</option>
  </select> 
  </div>
  <div class="tab"> <b>Choose Resting Electrocardiographic Results(EKG):</b></br>
  <select id="EKG_results" name="EKG_results" style="width: 100px;font-family: sans-serif;">
    <option value="0">Normal</option>
    <option value="1">Having ST-T wave abnormality</option>
    <option value="2">Showing probable or definite left ventricular hypertrophy by Estes' criteria</option>
  </select> 
  </div>
  <div class="tab"><b>Choose Max Heart Rate(HR):</b></br>
    <select id="Max_HR" name="Max_HR" style="width: 100px;font-family: sans-serif">
   <option value="71">71</option>
    <option value="88">88</option>
    <option value="90">90</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="99">99</option>
    <option value="103">103</option>
    <option value="105">105</option>
    <option value="106">106</option>
    <option value="108">108</option>
    <option value="109">109</option>
    <option value="111">111</option>
    <option value="112">112</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="117">117</option>
    <option value="118">118</option>
    <option value="120">120</option>
    <option value="121">121</option>
    <option value="122">122</option>
    <option value="123">123</option>
    <option value="124">124</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="129">129</option>
    <option value="130">130</option>
    <option value="131">131</option>
    <option value="132">132</option>
    <option value="133">133</option>
    <option value="134">134</option>
    <option value="136">136</option>
    <option value="137">137</option>
    <option value="138">138</option>
    <option value="139">139</option>
    <option value="140">140</option>
    <option value="141">141</option>
    <option value="142">142</option>
    <option value="143">143</option>
    <option value="144">144</option>
    <option value="145">145</option>
    <option value="146">146</option>
    <option value="147">147</option>
    <option value="148">148</option>
    <option value="149">149</option>
    <option value="150">150</option>
    <option value="151">151</option>
    <option value="152">152</option>
    <option value="153">153</option>
    <option value="154">154</option>
    <option value="155">155</option>
    <option value="156">156</option>
    <option value="157">157</option>
    <option value="158">158</option>
    <option value="159">159</option>
    <option value="160">160</option>
    <option value="161">161</option>
    <option value="162">162</option>
    <option value="163">163</option>
    <option value="164">164</option>
    <option value="165">165</option>
    <option value="166">166</option>
    <option value="167">167</option>
    <option value="168">168</option>
    <option value="169">169</option>
    <option value="170">170</option>
    <option value="171">171</option>
    <option value="172">172</option>
    <option value="173">173</option>
    <option value="174">174</option>
    <option value="175">175</option>
    <option value="177">177</option>
    <option value="178">178</option>
    <option value="179">179</option>
    <option value="180">180</option>
    <option value="181">181</option>
    <option value="182">182</option>
    <option value="184">184</option>
    <option value="185">185</option>
    <option value="186">186</option>
    <option value="187">187</option>
    <option value="188">188</option>
    <option value="190">190</option>
    <option value="192">192</option>
    <option value="194">194</option>
    <option value="195">195</option>
    <option value="202">202</option>
    
  </select>
  </div>
  <div class="tab"><b>Choose Exercise angina:</b></br>
  <select id="Exercise_angina" name="Exercise_angina" style="width: 100px;font-family: sans-serif;">
    <option value="0">No</option>
    <option value="1">Yes</option>
  </select> 
    
  </div>
  <div class="tab"><b>Choose Sinus Tachycardia(ST) depression:</b>
   <select id="ST_depression" name="ST_depression" style="width: 100px;font-family: sans-serif">
    <option value="0">0</option>
    <option value="0.1">0.1</option>
    <option value="0.2">0.2</option>
    <option value="0.3">0.3</option>
    <option value="0.4">0.4</option>
    <option value="0.5">0.5</option>
    <option value="0.6">0.6</option>
    <option value="0.7">0.7</option>
    <option value="0.8">0.8</option>
    <option value="0.9">0.9</option>
    <option value="1">1</option>
    <option value="1.1">1.1</option>
    <option value="1.2">1.2</option>
    <option value="1.3">1.3</option>
    <option value="1.4">1.4</option>
    <option value="1.5">1.5</option>
    <option value="1.6">1.6</option>
    <option value="1.8">1.8</option>
    <option value="1.9">1.9</option>
    <option value="2">2</option>
    <option value="2.1">2.1</option>
    <option value="2.2">2.2</option>
    <option value="2.3">2.3</option>
    <option value="2.4">2.4</option>
    <option value="2.5">2.5</option>
    <option value="2.6">2.6</option>
    <option value="2.8">2.8</option>
    <option value="2.9">2.9</option>
    <option value="3">3</option>
    <option value="3.1">3.1</option>
    <option value="3.2">3.2</option>
    <option value="3.4">3.4</option>
    <option value="3.5">3.5</option>
    <option value="3.6">3.6</option>
    <option value="3.8">3.8</option>
    <option value="4">4</option>
    <option value="4.2">4.2</option>
    <option value="4.4">4.4</option>
    <option value="5.6">5.6</option>
    <option value="6.2">6.2</option>
  </select> 
  </div>
  <div class="tab"><b>Choose Slope of Sinus Tachycardia(ST):</b></br>
  <select id="Slope_of_ST" name="Slope_of_ST" style="width: 100px;font-family: sans-serif;">
    <option value="0">Upsloping</option>
    <option value="1">Flat</option>
    <option value="2">Downsloping</option>
  </select> 
  </div>
  <div class="tab"><b>Choose Number of vessels fluro:</b></br>
    <select id="Number_of_vessels_fluro" name="Number_of_vessels_fluro" style="width: 100px;font-family: sans-serif;">
    <option value="0">0</option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
  </select> 
  </div>
  <div class="tab"><b>Choose Thallium:</b></br>
   <select id="Thallium" name="Thallium" style="width: 100px;font-family: sans-serif;">
    <option value="1">Normal</option>
    <option value="2">Fixed defect</option>
    <option value="3">Reversible Defect</option>
  </select>  
  </div>
  <div style="overflow:auto;" class="button">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" name="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>

</form>

<center><div style="margin-top:-30px">
      <?php 
      
      @$age = $_POST['Age'];
      @$gender = $_POST['Sex'];
      @$Chest_pain = $_POST['Chest_pain_type'];
      @$BP = $_POST['BP'];
      @$Cholesterol = $_POST['Cholesterol'];
      @$FBS = $_POST['FBS_over_120'];
      @$EKG = $_POST['EKG_results'];
      @$HR = $_POST['Max_HR'];
      @$Exercise_angina = $_POST['Exercise_angina'];
      @$ST_depression = $_POST['ST_depression'];
      @$Slope_ST = $_POST['Slope_of_ST'];
      @$vessels_fluro = $_POST['Number_of_vessels_fluro'];
      @$Thallium = $_POST['Thallium'];
$servername = "localhost";
$username = "Your username";
$password = "";
$dbname = "Your databasename";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM heart_disease_prediction WHERE Age = '$age' AND Sex = '$gender' AND Chest_pain_type = '$Chest_pain' AND BP = '$BP' AND Cholesterol = '$Cholesterol' AND FBS_over_120 = '$FBS' AND EKG_results = '$EKG' AND Max_HR = '$HR' AND Exercise_angina = '$Exercise_angina' AND ST_depression = '$ST_depression' AND Slope_of_ST = '$Slope_ST' AND Number_of_vessels_fluro = '$vessels_fluro' AND Thallium = '$Thallium' ";
$result = $conn->query($sql);
      if(isset($_POST['Age']) && isset($_POST['Sex']) && isset($_POST['Chest_pain_type']) && isset($_POST['BP']) && isset($_POST['Cholesterol']) && isset($_POST['FBS_over_120']) && isset($_POST['EKG_results']) && isset($_POST['Max_HR']) && isset($_POST['Exercise_angina'])&& isset($_POST['ST_depression']) && isset($_POST['Slope_of_ST']) && isset($_POST['Number_of_vessels_fluro']) && isset($_POST['Thallium'] )){
        $age = $_POST['Age'];
      $gender = $_POST['Sex'];
      $Chest_pain = $_POST['Chest_pain_type'];
      $BP = $_POST['BP'];
      $Cholesterol = $_POST['Cholesterol'];
      $FBS = $_POST['FBS_over_120'];
      $EKG = $_POST['EKG_results'];
      $HR = $_POST['Max_HR'];
      $Exercise_angina = $_POST['Exercise_angina'];
      $ST_depression = $_POST['ST_depression'];
      $Slope_ST = $_POST['Slope_of_ST'];
      $vessels_fluro = $_POST['Number_of_vessels_fluro'];
      $Thallium = $_POST['Thallium'];
      
        if($row = $result->fetch_assoc()) {
            
            $heart = $row["Heart Disease"];
            
            if($heart == 'Absence')
            {
                echo "<b style='font-size:20px '>Heart Disease:</b> <b style='color:green;font-size:20px'>Absence</b> <b style='font-size:25px'>&#128525</b>";
            }else{
                
                echo "<b style='font-size:20px '>Heart Disease:</b> <b style='color:red;font-size:20px'>Presence</b> <b style='font-size:25px'>&#128549</b> ";
                
            }
          
  }else{
    echo"<b style='font-size:20px '>Heart Disease:</b> <b style='color:green;font-size:20px'>Absence</b> <b style='font-size:25px'>&#128525</b>";
  }
      }
  
      ?>
    </div>
    </center>

<!-- SOCIAL PANEL HTML -->
<div class="social-panel-container">
  <div class="social-panel">
    <p>Created with <i class="fa fa-heart"></i> by
      <a target="_blank" href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw">Md Azizur Rohman</a></p>
    <button class="close-btn"><i class="fas fa-times"></i></button>
    <h4>Get in touch on</h4>
    <ul>
      <li>
        <a href="https://www.youtube.com/channel/UCHm0A4jHtX2z_QoVegVV2Cw" target="_blank">
          <i style="color:red" class="fab fa-youtube"></i>
        </a>
      </li>
      <li>
        <a href="https://twitter.com/" target="_blank">
          <i style="color:#03CBF8" class="fab fa-twitter"></i>
        </a>
      </li>
      <li>
        <a href="https://www.linkedin.com/in/azizur-rohman-9040" target="_blank">
          <i style="color:#037AF8" class="fab fa-linkedin"></i>
        </a>
      </li>
      <li>
        <a href="https://facebook.com/rajkumar.aziz.98" target="_blank">
          <i style="color:#039BF8" class="fab fa-facebook"></i>
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/azizur__rahman_" target="_blank">
          <i style="background-image:linear-gradient(to left,#FF5733,
          #C70039,#900C3F);-webkit-text-fill-color:transparent;-webkit-background-clip: text;" class="fab fa-instagram"></i>
        </a>
      </li>
    </ul>
  </div>
</div>
<button class="floating-btn">
  Get in Touch
</button>

<div class="floating-text">
  All Rights <a href="https://ninjaapple.com" target="_blank"> healthcare@ninjaapple.com</a>
</div>

<script>

var _0x83f2=["\x74\x61\x62","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x43\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x64\x69\x73\x70\x6C\x61\x79","\x73\x74\x79\x6C\x65","\x62\x6C\x6F\x63\x6B","\x70\x72\x65\x76\x42\x74\x6E","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x42\x79\x49\x64","\x6E\x6F\x6E\x65","\x69\x6E\x6C\x69\x6E\x65","\x6C\x65\x6E\x67\x74\x68","\x69\x6E\x6E\x65\x72\x48\x54\x4D\x4C","\x6E\x65\x78\x74\x42\x74\x6E","\x53\x75\x62\x6D\x69\x74","\x4E\x65\x78\x74","\x73\x75\x62\x6D\x69\x74","\x72\x65\x67\x46\x6F\x72\x6D","\x73\x65\x6C\x65\x63\x74","\x67\x65\x74\x45\x6C\x65\x6D\x65\x6E\x74\x73\x42\x79\x54\x61\x67\x4E\x61\x6D\x65","\x76\x61\x6C\x75\x65","","\x63\x6C\x61\x73\x73\x4E\x61\x6D\x65","\x20\x69\x6E\x76\x61\x6C\x69\x64","\x73\x74\x65\x70","\x20\x66\x69\x6E\x69\x73\x68","\x20\x61\x63\x74\x69\x76\x65","\x72\x65\x70\x6C\x61\x63\x65","\x2E\x70\x72\x6F\x66\x69\x6C\x65\x2D\x62\x74\x6E","\x71\x75\x65\x72\x79\x53\x65\x6C\x65\x63\x74\x6F\x72","\x23\x63\x6C\x6F\x73\x65\x64\x65\x74\x61\x69\x6C\x73","\x2E\x64\x65\x74\x61\x69\x6C\x73\x31\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72","\x63\x6C\x69\x63\x6B","\x76\x69\x73\x69\x62\x6C\x65","\x74\x6F\x67\x67\x6C\x65","\x63\x6C\x61\x73\x73\x4C\x69\x73\x74","\x61\x64\x64\x45\x76\x65\x6E\x74\x4C\x69\x73\x74\x65\x6E\x65\x72","\x72\x65\x6D\x6F\x76\x65","\x2E\x66\x6C\x6F\x61\x74\x69\x6E\x67\x2D\x62\x74\x6E","\x2E\x63\x6C\x6F\x73\x65\x2D\x62\x74\x6E","\x2E\x73\x6F\x63\x69\x61\x6C\x2D\x70\x61\x6E\x65\x6C\x2D\x63\x6F\x6E\x74\x61\x69\x6E\x65\x72"];var currentTab=0;showTab(currentTab);function showTab(_0x767ax3){var _0x767ax4=document[_0x83f2[1]](_0x83f2[0]);_0x767ax4[_0x767ax3][_0x83f2[3]][_0x83f2[2]]= _0x83f2[4];if(_0x767ax3== 0){document[_0x83f2[6]](_0x83f2[5])[_0x83f2[3]][_0x83f2[2]]= _0x83f2[7]}else {document[_0x83f2[6]](_0x83f2[5])[_0x83f2[3]][_0x83f2[2]]= _0x83f2[8]};if(_0x767ax3== (_0x767ax4[_0x83f2[9]]- 1)){document[_0x83f2[6]](_0x83f2[11])[_0x83f2[10]]= _0x83f2[12]}else {document[_0x83f2[6]](_0x83f2[11])[_0x83f2[10]]= _0x83f2[13]};fixStepIndicator(_0x767ax3)}function nextPrev(_0x767ax3){var _0x767ax4=document[_0x83f2[1]](_0x83f2[0]);if(_0x767ax3== 1&&  !validateForm()){return false};_0x767ax4[currentTab][_0x83f2[3]][_0x83f2[2]]= _0x83f2[7];currentTab= currentTab+ _0x767ax3;if(currentTab>= _0x767ax4[_0x83f2[9]]){document[_0x83f2[6]](_0x83f2[15])[_0x83f2[14]]();return false};showTab(currentTab)}function validateForm(){var _0x767ax4,_0x767ax7,_0x767ax8,_0x767ax9=true;_0x767ax4= document[_0x83f2[1]](_0x83f2[0]);_0x767ax7= _0x767ax4[currentTab][_0x83f2[17]](_0x83f2[16]);for(_0x767ax8= 0;_0x767ax8< _0x767ax7[_0x83f2[9]];_0x767ax8++){if(_0x767ax7[_0x767ax8][_0x83f2[18]]== _0x83f2[19]){_0x767ax7[_0x767ax8][_0x83f2[20]]+= _0x83f2[21];_0x767ax9= false}};if(_0x767ax9){document[_0x83f2[1]](_0x83f2[22])[currentTab][_0x83f2[20]]+= _0x83f2[23]};return _0x767ax9}function fixStepIndicator(_0x767ax3){var _0x767ax8,_0x767ax4=document[_0x83f2[1]](_0x83f2[22]);for(_0x767ax8= 0;_0x767ax8< _0x767ax4[_0x83f2[9]];_0x767ax8++){_0x767ax4[_0x767ax8][_0x83f2[20]]= _0x767ax4[_0x767ax8][_0x83f2[20]][_0x83f2[25]](_0x83f2[24],_0x83f2[19])};_0x767ax4[_0x767ax3][_0x83f2[20]]+= _0x83f2[24]}const profile_btn=document[_0x83f2[27]](_0x83f2[26]);const closedetails_btn=document[_0x83f2[27]](_0x83f2[28]);const details1_panel_container=document[_0x83f2[27]](_0x83f2[29]);profile_btn[_0x83f2[34]](_0x83f2[30],()=>{details1_panel_container[_0x83f2[33]][_0x83f2[32]](_0x83f2[31])});closedetails_btn[_0x83f2[34]](_0x83f2[30],()=>{details1_panel_container[_0x83f2[33]][_0x83f2[35]](_0x83f2[31])});const floating_btn=document[_0x83f2[27]](_0x83f2[36]);const close_btn=document[_0x83f2[27]](_0x83f2[37]);const social_panel_container=document[_0x83f2[27]](_0x83f2[38]);floating_btn[_0x83f2[34]](_0x83f2[30],()=>{social_panel_container[_0x83f2[33]][_0x83f2[32]](_0x83f2[31])});close_btn[_0x83f2[34]](_0x83f2[30],()=>{social_panel_container[_0x83f2[33]][_0x83f2[35]](_0x83f2[31])})

</script>

</body>
</html>