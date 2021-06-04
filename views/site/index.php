<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
 <div class="wrapper wrapper--w680">
     <div class="card card-4">
         <div class="card-body">
             <h2 class="title">Nomination Form</h2>
             <form method="post" action="">
                 <div class="row row-space">
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Name</label>
                             <input class="input--style-4" type="text" name="name" placeholder="Your Name">
                         </div>
                     </div>
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Email</label>
                             <input class="input--style-4" type="text" name="email" placeholder="Your Email">
                         </div>
                     </div>
                 </div>
                 <div class="row row-space">
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Name of the School</label>
                             <input class="input--style-4" type="text" name="schoolName" placeholder="Name of the School">
                         </div>
                     </div>
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Address of the School</label>
                             <input class="input--style-4" type="text" name="schoolAddress" placeholder="Address of the School">
                         </div>
                     </div>
                 </div>
                 <div class="row row-space">
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Name of the Contact</label>
                             <input class="input--style-4" type="text" name="contactName" placeholder="Name of the Contact">
                         </div>
                     </div>
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Position of the Contact</label>
                             <input class="input--style-4" type="text" name="contactPosition" placeholder="Position of the Contact">
                         </div>
                     </div>
                 </div>
                 <div class="row row-space">
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Your Connection to School</label>
                             <select name="connection">
                                 <option>Parent</option>
                                 <option>Teacher</option>
                                 <option>Governor</option>
                             </select>
                         </div>
                     </div>
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Email Address of the Contact</label>
                             <input class="input--style-4" type="text" name="connectionEmail" placeholder="Email of the Connection">
                         </div>
                     </div>
                 </div>
                 <div class="row row-space">
                     <div class="col-2">
                         <div class="input-group">
                             <label class="label-as">Any Other Information</label>
                             <input class="input--style-5" type="text" name="otherInfo" placeholder="Any Other Information">
                         </div>
                     </div>
                 </div>
                 <div class="p-t-15">
                     <button class="btn btn-primary" type="submit" style="width: 150px;height: 50px">Submit</button>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>
