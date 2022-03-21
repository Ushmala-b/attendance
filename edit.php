
  <?php 
       $title = 'Edit Record' ;
       require_once 'includes/header.php' ;
       require_once 'db/conn.php';

       $results  = $crud->getSpecialties();

       if(!isset($_GET['id']))
       {
          
          include 'includes/errormessage.php';
          header("Location:  viewrecords.php");
       }
       else{
          $id = $_GET['id'];
          $attendee = $crud->getAttendeeDetails($id);
       
         ?>

     
   <h1 class="text-center"> Edit Records </h1>
   
   <form method="post" action="edipost.php">
   <input type="hidden" name="id" value="<?php echo $attendee ['attendee']?>" />


          <div class="mb-3">
              <label for="firstname">First Name</label>
              <input type="text" class="form-control"  value="<?php echo $attendee ['firstname']?>"  id="firstname" placeholder="Enter Your First Name"   name="firstname" >
           </div>
           <div class="mb-3">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" value="<?php echo $attendee ['lastname']?>" id="lastname" placeholder="Enter Your Last Name"  name="lastname">
           </div>
           <div class="mb-3">
              <label for="dob">Date Of Birth</label>
              <input type="text" class="form-control" id="dob" placeholder="Enter Your dob" name="dob">
           </div>

           <div class="mb-3">
              <label for="specialty">Area of Expertise</label>
              <select class="form-control" id="specialty" name="specialty">
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <option  value="<?php echo $r['specialty_id'] ?>" 
             <?php if($r ['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
            <?php echo $r['name']; ?> </option>
               
            
            <?php }  ?>
               </select>
            </div>

           <div class="mb-3">
               <label for="email">Email address</label>
                <input type="email" class="form-control" id="email"  name="email"  aria-describedby="emailHelp" placeholder="Enter you email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
           </div>
           <div class="mb-3">
               <label for="phone">Contact Number</label>
                <input type="text"  class="form-control" id="phone"  name="phone" aria-describedby="emailHelp" placeholder="Enter you number">
                <div id="honeHelp" class="form-text">We'll never share your number with anyone else.</div>
           </div>

      <button type="submit" name="submit"  class="btn btn-success btn-block">Save Changes</button>
<?php
       }
?>
    </form>
      <br>
      <br>
      <br>
   <?php require_once 'includes/footer.php' ?>