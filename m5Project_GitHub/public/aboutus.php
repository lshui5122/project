<?php
session_start();
use classes\business\UserManager;
use classes\business\Validation;

require_once 'includes/autoload.php';
include 'includes/header.php';
?>

  <div class="container-fluid" style="height:100%; background-color: white;color:#727272; padding:30px;"> 

      <div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3"></div>
      
          <div class="col-lg-8 col-md-6 col-sm-6">
              <h2 class="text-center" style="color:#58ba52; padding:30px;"><strong>About Us</strong></h2>
              
 
<div class="text-justify">
<p>
Tired searching for a job? Feeling helpless? Tired of waiting for a response after applying on those job portals? We are there to help you out.

Brand You has come up with an amazing job portal where candidates can apply for desired jobs and even employers can post their requirements. With two separate registrations, this portal allows both candidates and the employers, an ease in searching for the suitable match for each other. It allows the employers to send an email or sms to the candidates they feel are fit for the vacancy they have.
</p>
 
<p>
Features for Candidates:

Candidates can search for a job according to their preferred city.
Candidates can send their resumes to the companies which are located in their preferred cities.
Candidates can fill the bio data form which is designed for them in the portal with an attachment of their resume.
Candidates shall receive an email or sms if they are being short listed for the interview by an employer.
 </p>
<p>
Features for Employers:

Employers can find suitable candidates by searching with the desired key words for the vacancy.
Employers can post the vacancies by filling up a form designed for the same. They can mention the job description and salary offered in that.
Employers will be allowed to send out an email or sms to those candidates directly who found to fit the criteria of the job opening.
</p>
</div>
</div>

<div class="row">
          <div class="col-lg-2 col-md-3 col-sm-3"></div>
          </div>
          
          </div>
          
<?php
include 'includes/footer.php';
?>