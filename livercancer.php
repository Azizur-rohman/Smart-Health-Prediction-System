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
	<title>Liver Cancer Disease</title>
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
        <a href="heartdisease.php">Heart Disease</a>
        <a href="livercancer.php" class="active" >Liver Cancer</a>
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

<center><h2 >Liver Cancer Disease Prediction</h2></center>
      
    <form id="regForm"method="POST" action="livercancer.php">
  
  <!-- One "tab" for each step in the form: -->
  <div class="tab"><b>Choose Your Age:</b>
  
  <select id="Age" name="Age" style="width: 100px;font-family: sans-serif">
    <option value="4">4</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
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
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="78">78</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="90">90</option>
  </select>

 


  </div>
  <div class="tab">



     <label for="gender"><b>Choose a Gender:</b></label></br>
  <select id="Sex" name="Gender" style="width: 100px;font-family: sans-serif">
    <option value="Female">Female</option>
    <option value="Male">Male</option>
    <option value="Other">Other</option>
  </select>


    
  </div>
  <div class="tab">
    <label for="Chest_pain"><b>Choose Total Bilirubin:</b></label>
  <select id="Chest_pain_type" name="Total_Bilirubin" style="width: 100px;font-family: sans-serif">
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
    <option value="1.7">1.7</option>
    <option value="1.8">1.8</option>
    <option value="1.9">1.9</option>
    <option value="2">2</option>
    <option value="2.1">2.1</option>
    <option value="2.2">2.2</option>
    <option value="2.3">2.3</option>
    <option value="2.4">2.4</option>
    <option value="2.5">2.5</option>
    <option value="2.6">2.6</option>
    <option value="2.7">2.7</option>
    <option value="2.8">2.8</option>
    <option value="2.9">2.9</option>
    <option value="3">3</option>
    <option value="3.1">3.1</option>
    <option value="3.2">3.2</option>
    <option value="3.3">3.3</option>
    <option value="3.4">3.4</option>
    <option value="3.4">3.4</option>
    <option value="3.5">3.5</option>
    <option value="3.6">3.6</option>
    <option value="3.7">3.7</option>
    <option value="3.8">3.8</option>
    <option value="3.9">3.9</option>
    <option value="4">4</option>
    <option value="4.1">4.1</option>
    <option value="4.2">4.2</option>
    <option value="4.4">4.4</option>
    <option value="4.5">4.5</option>
    <option value="4.7">4.7</option>
    <option value="4.9">4.9</option>
    <option value="5">5</option>
    <option value="5.2">5.2</option>
    <option value="5.3">5.3</option>
    <option value="5.5">5.5</option>
    <option value="5.7">5.7</option>
    <option value="5.8">5.8</option>
    <option value="5.9">5.9</option>
    <option value="6.2">6.2</option>
    <option value="6.3">6.3</option>
    <option value="6.6">6.6</option>
    <option value="6.7">6.7</option>
    <option value="6.8">6.8</option>
    <option value="7.1">7.1</option>
    <option value="7.3">7.3</option>
    <option value="7.4">7.4</option>
    <option value="7.5">7.5</option>
    <option value="7.7">7.7</option>
    <option value="7.9">7.9</option>
    <option value="8">8</option>
    <option value="8.2">8.2</option>
    <option value="8.6">8.6</option>
    <option value="8.7">8.7</option>
    <option value="8.9">8.9</option>
    <option value="9.4">9.4</option>
    <option value="10.2">10.2</option>
    <option value="10.6">10.6</option>
    <option value="10.9">10.9</option>
    <option value="11">11</option>
    <option value="11.1">11.1</option>
    <option value="11.3">11.3</option>
    <option value="11.5">11.5</option>
    <option value="12.1">12.1</option>
    <option value="12.7">12.7</option>
    <option value="14.1">14.1</option>
    <option value="14.2">14.2</option>
    <option value="14.5">14.5</option>
    <option value="14.8">14.8</option>
    <option value="15">15</option>
    <option value="15.2">15.2</option>
    <option value="15.6">15.6</option>
    <option value="15.8">15.8</option>
    <option value="15.9">15.9</option>
    <option value="16.4">16.4</option>
    <option value="16.6">16.6</option>
    <option value="16.7">16.7</option>
    <option value="17.3">17.3</option>
    <option value="17.7">17.7</option>
    <option value="18">18</option>
    <option value="18.4">18.4</option>
    <option value="18.5">18.5</option>
    <option value="19.6">19.6</option>
    <option value="19.8">19.8</option>
    <option value="20">20</option>
    <option value="20.2">20.2</option>
    <option value="22.5">22.5</option>
    <option value="22.6">22.6</option>
    <option value="22.7">22.7</option>
    <option value="22.8">22.8</option>
    <option value="23">23</option>
    <option value="23.2">23.2</option>
    <option value="23.3">23.3</option>
    <option value="25">25</option>
    <option value="26.3">26.3</option>
    <option value="27.2">27.2</option>
    <option value="27.7">27.7</option>
    <option value="30.5">30.5</option>
    <option value="30.8">30.8</option>
    <option value="32.6">32.6</option>
    <option value="42.8">42.8</option>
    <option value="75">75</option>
  </select>
  </div>
  <div class="tab">
      <label for="BP"><b>Choose Direct Bilirubin:</b></label>
  <select id="BP" name="Direct_Bilirubin" style="width: 100px;font-family: sans-serif">
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
    <option value="1.7">1.7</option>
    <option value="1.8">1.8</option>
    <option value="1.9">1.9</option>
    <option value="2">2</option>
    <option value="2.1">2.1</option>
    <option value="2.2">2.2</option>
    <option value="2.3">2.3</option>
    <option value="2.4">2.4</option>
    <option value="2.5">2.5</option>
    <option value="2.6">2.6</option>
    <option value="2.7">2.7</option>
    <option value="2.8">2.8</option>
    <option value="2.9">2.9</option>
    <option value="3">3</option>
    <option value="3.2">3.2</option>
    <option value="3.6">3.6</option>
    <option value="3.7">3.7</option>
    <option value="3.9">3.9</option>
    <option value="4">4</option>
    <option value="4.1">4.1</option>
    <option value="4.2">4.2</option>
    <option value="4.3">4.3</option>
    <option value="4.5">4.5</option>
    <option value="4.6">4.6</option>
    <option value="4.9">4.9</option>
    <option value="5">5</option>
    <option value="5.1">5.1</option>
    <option value="5.2">5.2</option>
    <option value="5.5">5.5</option>
    <option value="5.6">5.6</option>
    <option value="6">6</option>
    <option value="6.1">6.1</option>
    <option value="6.2">6.2</option>
    <option value="6.4">6.4</option>
    <option value="7">7</option>
    <option value="7.2">7.2</option>
    <option value="7.6">7.6</option>
    <option value="7.7">7.7</option>
    <option value="7.8">7.8</option>
    <option value="8.2">8.2</option>
    <option value="8.4">8.4</option>
    <option value="8.5">8.5</option>
    <option value="8.8">8.8</option>
    <option value="8.9">8.9</option>
    <option value="9">9</option>
    <option value="9.5">9.5</option>
    <option value="10">10</option>
    <option value="10.2">10.2</option>
    <option value="10.4">10.4</option>
    <option value="10.8">10.8</option>
    <option value="11.3">11.3</option>
    <option value="11.4">11.4</option>
    <option value="11.7">11.7</option>
    <option value="11.8">11.8</option>
    <option value="12.1">12.1</option>
    <option value="12.6">12.6</option>
    <option value="12.8">12.8</option>
    <option value="13.7">13.7</option>
    <option value="14.1">14.1</option>
    <option value="14.2">14.2</option>
    <option value="17.1">17.1</option>
    <option value="18.3">18.3</option>
    <option value="19.7">19.7</option>
  </select>
  </div>
  <div class="tab">
    <label for="Cholesterol"><b>Choose Alkaline Phosphotase:</b></label>
  <select id="Cholesterol" name="Alkaline_Phosphotase" style="width: 100px;font-family: sans-serif">
    <option value="63">63</option>
    <option value="75">75</option>
    <option value="90">90</option>
    <option value="92">92</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="100">100</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="105">105</option>
    <option value="108">108</option>
    <option value="110">110</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="120">120</option>
    <option value="123">123</option>
    <option value="125">125</option>
    <option value="127">127</option>
    <option value="128">128</option>
    <option value="130">130</option>
    <option value="134">134</option>
    <option value="135">135</option>
     <option value="137">137</option>
    <option value="138">138</option>
    <option value="140">140</option>
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
    <option value="176">176</option>
    <option value="177">177</option>
    <option value="178">178</option>
    <option value="179">179</option>
    <option value="180">180</option>
    <option value="181">181</option>
    <option value="182">182</option>
    <option value="183">183</option>
    <option value="184">184</option>
    <option value="185">185</option>
    <option value="186">186</option>
    <option value="187">187</option>
    <option value="188">188</option>
    <option value="189">189</option>
    <option value="190">190</option>
    <option value="191">191</option>
    <option value="192">192</option>
    <option value="193">193</option>
    <option value="194">194</option>
    <option value="195">195</option>
    <option value="196">196</option>
    <option value="197">197</option>
    <option value="198">198</option>
    <option value="199">199</option>
    <option value="200">200</option>
    <option value="201">201</option>
    <option value="202">202</option>
    <option value="204">204</option>
    <option value="205">205</option>
    <option value="206">206</option>
    <option value="208">208</option>
    <option value="209">209</option>
    <option value="210">210</option>
    <option value="211">211</option>
    <option value="212">212</option>
    <option value="214">214</option>
    <option value="215">215</option>
    <option value="216">216</option>
    <option value="218">218</option>
    <option value="219">219</option>
    <option value="220">220</option>
    <option value="224">224</option>
    <option value="225">225</option>
    <option value="226">226</option>
    <option value="227">227</option>
    <option value="228">228</option>
    <option value="230">230</option>
    <option value="231">231</option>
    <option value="232">232</option>
    <option value="234">234</option>
    <option value="235">235</option>
    <option value="236">236</option>
    <option value="237">237</option>
    <option value="238">238</option>
    <option value="239">239</option>
    <option value="240">240</option>
    <option value="243">243</option>
    <option value="245">245</option>
    <option value="246">246</option>
    <option value="247">247</option>
    <option value="248">248</option>
    <option value="250">250</option>
    <option value="251">251</option>
    <option value="253">253</option>
    <option value="254">254</option>
    <option value="256">256</option>
    <option value="257">257</option>
    <option value="258">258</option>
    <option value="259">259</option>
    <option value="260">260</option>
    <option value="262">262</option>
    <option value="263">263</option>
    <option value="265">265</option>
    <option value="268">268</option>
    <option value="269">269</option>
    <option value="270">270</option>
    <option value="271">271</option>
    <option value="272">272</option>
    <option value="275">275</option>
    <option value="276">276</option>
    <option value="279">279</option>
    <option value="280">280</option>
    <option value="282">282</option>
    <option value="285">285</option>
    <option value="286">286</option>
    <option value="289">289</option>
    <option value="290">290</option>
    <option value="292">292</option>
    <option value="293">293</option>
    <option value="298">298</option>
    <option value="300">300</option>
    <option value="302">302</option>
    <option value="305">305</option>
    <option value="308">308</option>
    <option value="309">309</option>
    <option value="310">310</option>
    <option value="312">312</option>
    <option value="314">314</option>
    <option value="315">315</option>
    <option value="316">316</option>
    <option value="320">320</option>
    <option value="326">326</option>
    <option value="331">331</option>
    <option value="332">332</option>
    <option value="335">335</option>
    <option value="340">340</option>
    <option value="342">342</option>
    <option value="348">348</option>
    <option value="349">349</option>
    <option value="350">350</option>
    <option value="352">352</option>
    <option value="356">356</option>
    <option value="358">358</option>
    <option value="360">360</option>
    <option value="365">365</option>
    <option value="367">367</option>
    <option value="374">374</option>
    <option value="375">375</option>
    <option value="380">380</option>
    <option value="386">386</option>
    <option value="388">388</option>
    <option value="390">390</option>
    <option value="392">392</option>
    <option value="395">395</option>
    <option value="400">400</option>
    <option value="401">401</option>
    <option value="405">405</option>
    <option value="406">406</option>
    <option value="410">410</option>
    <option value="415">415</option>
    <option value="418">418</option>
    <option value="430">430</option>
    <option value="450">450</option>
    <option value="458">458</option>
    <option value="460">460</option>
    <option value="462">462</option>
    <option value="466">466</option>
    <option value="470">470</option>
    <option value="480">480</option>
    <option value="482">482</option>
    <option value="486">486</option>
    <option value="490">490</option>
    <option value="498">498</option>
    <option value="500">500</option>
    <option value="505">505</option>
    <option value="509">509</option>
    <option value="512">512</option>
    <option value="515">515</option>
    <option value="518">518</option>
    <option value="527">527</option>
    <option value="538">538</option>
    <option value="542">542</option>
    <option value="554">554</option>
    <option value="555">555</option>
    <option value="558">558</option>
    <option value="560">560</option>
    <option value="562">562</option>
    <option value="574">574</option>
    <option value="575">575</option>
    <option value="580">580</option>
    <option value="588">588</option>
    <option value="592">592</option>
    <option value="599">599</option>
    <option value="610">610</option>
    <option value="612">612</option>
    <option value="614">614</option>
    <option value="621">621</option>
    <option value="630">630</option>
    <option value="650">650</option>
    <option value="661">661</option>
    <option value="664">664</option>
    <option value="670">670</option>
    <option value="680">680</option>
    <option value="686">686</option>
    <option value="690">690</option>
    <option value="699">699</option>
    <option value="719">719</option>
    <option value="750">750</option>
    <option value="768">768</option>
    <option value="802">802</option>
    <option value="805">805</option>
    <option value="850">850</option>
    <option value="859">859</option>
    <option value="862">862</option>
    <option value="901">901</option>
    <option value="915">915</option>
    <option value="950">950</option>
    <option value="962">962</option>
    <option value="1020">1020</option>
    <option value="1050">1050</option>
    <option value="1100">1100</option>
    <option value="1110">1110</option>
    <option value="1124">1124</option>
    <option value="1350">1350</option>
    <option value="1420">1420</option>
    <option value="1550">1550</option>
    <option value="1580">1580</option>
    <option value="1620">1620</option>
    <option value="1630">1630</option>
    <option value="1750">1750</option>
    <option value="1896">1896</option>
    <option value="2110">2110</option>
  </select>
  </div>
  <div class="tab">
   <label for="FBS"><b>Choose Alamine Aminotransferase:</b></label></br>
  <select id="FBS_over_120" name="Alamine_Aminotransferase" style="width: 100px;font-family: sans-serif;">
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
     <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
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
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="69">69</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="82">82</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="93">93</option>
    <option value="94">94</option>
    <option value="95">95</option>
    <option value="96">96</option>
    <option value="97">97</option>
    <option value="99">99</option>
    <option value="102">102</option>
    <option value="107">107</option>
    <option value="110">110</option>
    <option value="112">112</option>
    <option value="114">114</option>
    <option value="115">115</option>
    <option value="116">116</option>
    <option value="118">118</option>
    <option value="119">119</option>
    <option value="120">120</option>
    <option value="123">123</option>
    <option value="126">126</option>
    <option value="131">131</option>
    <option value="132">132</option>
    <option value="133">133</option>
    <option value="137">137</option>
    <option value="139">139</option>
    <option value="140">140</option>
    <option value="141">141</option>
    <option value="142">142</option>
    <option value="148">148</option>
    <option value="149">149</option>
    <option value="152">152</option>
    <option value="154">154</option>
    <option value="155">155</option>
    <option value="157">157</option>
    <option value="159">159</option>
    <option value="160">160</option>
    <option value="166">166</option>
    <option value="168">168</option>
    <option value="173">173</option>
    <option value="178">178</option>
    <option value="179">179</option>
    <option value="181">181</option>
    <option value="189">189</option>
    <option value="190">190</option>
    <option value="194">194</option>
    <option value="196">196</option>
    <option value="198">198</option>
    <option value="205">205</option>
    <option value="213">213</option>
    <option value="220">220</option>
    <option value="230">230</option>
    <option value="232">232</option>
    <option value="233">233</option>
    <option value="284">284</option>
    <option value="308">308</option>
    <option value="321">321</option>
    <option value="322">322</option>
    <option value="349">349</option>
    <option value="378">378</option>
    <option value="382">382</option>
    <option value="390">390</option>
    <option value="404">404</option>
    <option value="407">407</option>
    <option value="412">412</option>
    <option value="425">425</option>
    <option value="440">440</option>
    <option value="482">482</option>
    <option value="509">509</option>
    <option value="622">622</option>
    <option value="779">779</option>
    <option value="790">790</option>
    <option value="875">875</option>
    <option value="950">950</option>
    <option value="1250">1250</option>
    <option value="1350">1350</option>
    <option value="1630">1630</option>
    <option value="1680">1680</option>
    <option value="2000">2000</option>
  </select> 
  </div>
  <div class="tab"> <b>Choose Aspartate Aminotransferase:</b></br>
  <select id="EKG_results" name="Aspartate_Aminotransferase" style="width: 100px;font-family: sans-serif;">
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
    <option value="32">32</option>
    <option value="33">33</option>
    <option value="34">34</option>
    <option value="35">35</option>
    <option value="36">36</option>
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
    <option value="67">67</option>
    <option value="68">68</option>
    <option value="70">70</option>
    <option value="71">71</option>
    <option value="72">72</option>
    <option value="73">73</option>
    <option value="74">74</option>
    <option value="75">75</option>
    <option value="76">76</option>
    <option value="78">78</option>
    <option value="79">79</option>
    <option value="80">80</option>
    <option value="81">81</option>
    <option value="82">82</option>
    <option value="83">83</option>
    <option value="84">84</option>
    <option value="85">85</option>
    <option value="86">86</option>
    <option value="87">87</option>
    <option value="88">88</option>
    <option value="89">89</option>
    <option value="90">90</option>
    <option value="91">91</option>
    <option value="92">92</option>
    <option value="95">95</option>
    <option value="97">97</option>
    <option value="98">98</option>
    <option value="99">99</option>
    <option value="100">100</option>
    <option value="101">101</option>
    <option value="102">102</option>
    <option value="103">103</option>
    <option value="104">104</option>
    <option value="105">105</option>
    <option value="108">108</option>
    <option value="110">110</option>
    <option value="111">111</option>
    <option value="113">113</option>
    <option value="114">114</option>
    <option value="116">116</option>
    <option value="125">125</option>
    <option value="126">126</option>
    <option value="127">127</option>
    <option value="130">130</option>
    <option value="134">134</option>
    <option value="135">135</option>
    <option value="138">138</option>
    <option value="139">139</option>
    <option value="140">140</option>
    <option value="141">141</option>
    <option value="142">142</option>
    <option value="143">143</option>
    <option value="145">145</option>
    <option value="148">148</option>
    <option value="149">149</option>
    <option value="150">150</option>
    <option value="152">152</option>
    <option value="155">155</option>
    <option value="156">156</option>
    <option value="161">161</option>
    <option value="168">168</option>
    <option value="176">176</option>
    <option value="178">178</option>
    <option value="180">180</option>
    <option value="181">181</option>
    <option value="185">185</option>
    <option value="186">186</option>
    <option value="187">187</option>
    <option value="188">188</option>
    <option value="190">190</option>
    <option value="200">200</option>
    <option value="202">202</option>
    <option value="220">220</option>
    <option value="221">221</option>
    <option value="230">230</option>
    <option value="231">231</option>
    <option value="232">232</option>
    <option value="233">233</option>
    <option value="235">235</option>
    <option value="236">236</option>
    <option value="245">245</option>
    <option value="247">247</option>
    <option value="248">248</option>
    <option value="250">250</option>
    <option value="275">275</option>
    <option value="285">285</option>
    <option value="298">298</option>
    <option value="330">330</option>
    <option value="348">348</option>
    <option value="350">350</option>
    <option value="367">367</option>
    <option value="368">368</option>
    <option value="384">384</option>
    <option value="397">397</option>
    <option value="400">400</option>
    <option value="401">401</option>
    <option value="405">405</option>
    <option value="406">406</option>
    <option value="441">441</option>
    <option value="497">497</option>
    <option value="500">500</option>
    <option value="511">511</option>
    <option value="540">540</option>
    <option value="562">562</option>
    <option value="576">576</option>
    <option value="602">602</option>
    <option value="623">623</option>
    <option value="630">630</option>
    <option value="731">731</option>
    <option value="794">794</option>
    <option value="844">844</option>
    <option value="850">850</option>
    <option value="950">950</option>
    <option value="960">960</option>
    <option value="1050">1050</option>
    <option value="1500">1500</option>
    <option value="1600">1600</option>
    <option value="2946">2946</option>
    <option value="4929">4929</option>
  </select> 
  </div>
  <div class="tab"><b>Choose Total Protiens:</b></br>
    <select id="Max_HR" name="Total_Protiens" style="width: 100px;font-family: sans-serif">
   <option value="2.7">2.7</option>
    <option value="2.8">2.8</option>
    <option value="3">3</option>
    <option value="3.6">3.6</option>
    <option value="3.7">3.7</option>
    <option value="3.8">3.8</option>
    <option value="3.9">3.9</option>
    <option value="4">4</option>
    <option value="4.1">4.1</option>
    <option value="4.3">4.3</option>
    <option value="4.4">4.4</option>
    <option value="4.5">4.5</option>
    <option value="4.6">4.6</option>
    <option value="4.7">4.7</option>
    <option value="4.8">4.8</option>
    <option value="4.9">4.9</option>
    <option value="5">5</option>
    <option value="5.1">5.1</option>
    <option value="5.2">5.2</option>
    <option value="5.3">5.3</option>
    <option value="5.4">5.4</option>
    <option value="5.5">5.5</option>
    <option value="5.6">5.6</option>
    <option value="5.7">5.7</option>
    <option value="5.8">5.8</option>
    <option value="5.9">5.9</option>
    <option value="6">6</option>
    <option value="6.1">6.1</option>
    <option value="6.2">6.2</option>
    <option value="6.3">6.3</option>
    <option value="6.4">6.4</option>
    <option value="6.5">6.5</option>
    <option value="6.6">6.6</option>
    <option value="6.7">6.7</option>
    <option value="6.8">6.8</option>
    <option value="6.9">6.9</option>
    <option value="7">7</option>
    <option value="7.1">7.1</option>
    <option value="7.2">7.2</option>
    <option value="7.3">7.3</option>
    <option value="7.4">7.4</option>
    <option value="7.5">7.5</option>
    <option value="7.6">7.6</option>
    <option value="7.7">7.7</option>
    <option value="7.8">7.8</option>
    <option value="7.9">7.9</option>
    <option value="8">8</option>
    <option value="8.1">8.1</option>
    <option value="8.2">8.2</option>
    <option value="8.3">8.3</option>
    <option value="8.4">8.4</option>
    <option value="8.5">8.5</option>
    <option value="8.6">8.6</option>
    <option value="8.7">8.7</option>
    <option value="8.9">8.9</option>
    <option value="9.2">9.2</option>
    <option value="9.5">9.5</option>
    <option value="9.6">9.6</option>
  </select>
  </div>
  <div class="tab"><b>Choose Albumin:</b></br>
  <select id="Exercise_angina" name="Albumin" style="width: 100px;font-family: sans-serif;">
    <option value="0.9">0.9</option>
    <option value="1">1</option>
    <option value="1.4">1.4</option>
    <option value="1.5">1.5</option>
    <option value="1.6">1.6</option>
    <option value="1.7">1.7</option>
    <option value="1.8">1.8</option>
    <option value="1.9">1.9</option>
    <option value="2">2</option>
    <option value="2.1">2.1</option>
    <option value="2.2">2.2</option>
    <option value="2.3">2.3</option>
    <option value="2.4">2.4</option>
    <option value="2.5">2.5</option>
    <option value="2.6">2.6</option>
    <option value="2.7">2.7</option>
    <option value="2.8">2.8</option>
    <option value="2.9">2.9</option>
    <option value="3">3</option>
    <option value="3.1">3.1</option>
    <option value="3.2">3.2</option>
    <option value="3.3">3.3</option>
    <option value="3.4">3.4</option>
    <option value="3.5">3.5</option>
    <option value="3.6">3.6</option>
    <option value="3.7">3.7</option>
    <option value="3.8">3.8</option>
    <option value="3.9">3.9</option>
    <option value="4">4</option>
    <option value="4.1">4.1</option>
    <option value="4.2">4.2</option>
    <option value="4.3">4.3</option>
    <option value="4.4">4.4</option>
    <option value="4.5">4.5</option>
    <option value="4.6">4.6</option>
    <option value="4.7">4.7</option>
    <option value="4.8">4.8</option>
    <option value="4.9">4.9</option>
    <option value="5">5</option>
    <option value="5.5">5.5</option>
  </select> 
    
  </div>
  <div class="tab"><b>Choose Albumin and Globulin Ratio:</b>
   <select id="ST_depression" name="Albumin_and_Globulin_Ratio" style="width: 100px;font-family: sans-serif">
    <option value="0.3">0.3</option>
    <option value="0.35">0.35</option>
    <option value="0.37">0.37</option>
    <option value="0.39">0.39</option>
    <option value="0.4">0.4</option>
    <option value="0.45">0.45</option>
    <option value="0.46">0.46</option>
    <option value="0.47">0.47</option>
    <option value="0.48">0.48</option>
    <option value="0.5">0.5</option>
    <option value="0.52">0.52</option>
    <option value="0.53">0.53</option>
    <option value="0.55">0.55</option>
    <option value="0.58">0.58</option>
    <option value="0.6">0.6</option>
    <option value="0.61">0.61</option>
    <option value="0.62">0.62</option>
    <option value="0.64">0.64</option>
    <option value="0.67">0.67</option>
    <option value="0.68">0.68</option>
    <option value="0.69">0.69</option>
    <option value="0.7">0.7</option>
    <option value="0.71">0.71</option>
    <option value="0.74">0.74</option>
    <option value="0.75">0.75</option>
    <option value="0.76">0.76</option>
    <option value="0.78">0.78</option>
    <option value="0.8">0.8</option>
    <option value="0.87">0.87</option>
    <option value="0.88">0.88</option>
    <option value="0.89">0.89</option>
    <option value="0.9">0.9</option>
    <option value="0.92">0.92</option>
    <option value="0.93">0.93</option>
    <option value="0.95">0.95</option>
    <option value="0.96">0.96</option>
    <option value="0.97">0.97</option>
    <option value="1">1</option>
    <option value="1.02">1.02</option>
    <option value="1.03">1.03</option>
    <option value="1.06">1.06</option>
    <option value="1.09">1.09</option>
    <option value="1.1">1.1</option>
    <option value="1.11">1.11</option>
    <option value="1.12">1.12</option>
    <option value="1.16">1.16</option>
    <option value="1.18">1.18</option>
    <option value="1.2">1.2</option>
    <option value="1.25">1.25</option>
    <option value="1.27">1.27</option>
    <option value="1.3">1.3</option>
    <option value="1.34">1.34</option>
    <option value="1.36">1.36</option>
    <option value="1.38">1.38</option>
    <option value="1.39">1.39</option>
    <option value="1.4">1.4</option>
    <option value="1.5">1.5</option>
    <option value="1.51">1.51</option>
    <option value="1.55">1.55</option>
    <option value="1.58">1.58</option>
    <option value="1.6">1.6</option>
    <option value="1.66">1.66</option>
    <option value="1.7">1.7</option>
    <option value="1.72">1.72</option>
    <option value="1.8">1.8</option>
    <option value="1.85">1.85</option>
    <option value="1.9">1.9</option>
    <option value="2.5">2.5</option>
    <option value="2.8">2.8</option>
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
  </div>

</form>

<center><div style="margin-top:-30px">
      <?php 
      
      @$age = $_POST['Age'];
      @$Gender = $_POST['Gender'];
      @$Total_Bilirubin = $_POST['Total_Bilirubin'];
      @$Direct_Bilirubin = $_POST['Direct_Bilirubin'];
      @$Alkaline_Phosphotase = $_POST['Alkaline_Phosphotase'];
      @$Alamine_Aminotransferase = $_POST['Alamine_Aminotransferase'];
      @$Aspartate_Aminotransferase = $_POST['Aspartate_Aminotransferase'];
      @$Total_Protiens = $_POST['Total_Protiens'];
      @$Albumin = $_POST['Albumin'];
      @$Albumin_and_Globulin_Ratio = $_POST['Albumin_and_Globulin_Ratio'];
$servername = "localhost";
$username = "Your username";
$password = "";
$dbname = "Your databasename";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM liver_cancer_disease_prediction WHERE Age = '$age' AND Gender = '$Gender' AND Total_Bilirubin = '$Total_Bilirubin' AND Direct_Bilirubin = '$Direct_Bilirubin' AND Alkaline_Phosphotase = '$Alkaline_Phosphotase' AND Alamine_Aminotransferase = '$Alamine_Aminotransferase' AND Aspartate_Aminotransferase = '$Aspartate_Aminotransferase' AND Total_Protiens = '$Total_Protiens' AND Albumin = '$Albumin' AND Albumin_and_Globulin_Ratio = '$Albumin_and_Globulin_Ratio' ";
$result = $conn->query($sql);
      if(isset($_POST['Age']) && isset($_POST['Gender']) && isset($_POST['Total_Bilirubin']) && isset($_POST['Direct_Bilirubin']) && isset($_POST['Alkaline_Phosphotase']) && isset($_POST['Alamine_Aminotransferase']) && isset($_POST['Aspartate_Aminotransferase']) && isset($_POST['Total_Protiens']) && isset($_POST['Albumin'])&& isset($_POST['Albumin_and_Globulin_Ratio'])){
        $age = $_POST['Age'];
      $Gender = $_POST['Gender'];
      $Total_Bilirubin = $_POST['Total_Bilirubin'];
      $Direct_Bilirubin = $_POST['Direct_Bilirubin'];
      $Alkaline_Phosphotase = $_POST['Alkaline_Phosphotase'];
      $Alamine_Aminotransferase = $_POST['Alamine_Aminotransferase'];
      $Aspartate_Aminotransferase = $_POST['Aspartate_Aminotransferase'];
      $Total_Protiens = $_POST['Total_Protiens'];
      $Albumin = $_POST['Albumin'];
      $Albumin_and_Globulin_Ratio = $_POST['Albumin_and_Globulin_Ratio'];
      
        if($row = $result->fetch_assoc()) {
            
            $heart = $row["Liver_cancer_disease"];
            
            if($heart == 'Absence')
            {
                echo "<b style='font-size:20px '>Liver Cancer Disease:</b> <b style='color:green;font-size:20px'>Absence</b> <b style='font-size:25px'>&#128525</b>";
            }else{
                
                echo "<b style='font-size:20px '>Liver Cancer Disease:</b> <b style='color:red;font-size:20px'>Presence</b> <b style='font-size:25px'>&#128549</b> ";
                
            }
          
  }else{
    echo"<b style='font-size:20px '>Liver Cancer Disease:</b> <b style='color:green;font-size:20px'>Absence</b> <b style='font-size:25px'>&#128525</b>";
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