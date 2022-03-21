
  <?php 
       $title = 'Index' ;
       require_once 'includes/header.php' ;
       require_once 'db/conn.php';

       $results  = $crud->getSpecialties();
  ?>
      <!--
          -First Name
          -Last Name
          -Date of Birth (Use DatePicker)
          -Specialty (Database Admin, Software Developer, Web Administrator,Other)
          -Email Address
          -Contact Number
       -->
   <h1 class="text-center">Registration for IT Conference</h1>
   
   <form method="post" action="success.php">
          <div class="mb-3">
              <label for="firstname">First Name</label>
              <input required type="text" class="form-control" id="firstname" placeholder="Enter Your First Name"   name="firstname" >
           </div>
           <div class="mb-3">
              <label for="lastname">Last Name</label>
              <input type="text" class="form-control" id="lastname" placeholder="Enter Your Last Name"  name="lastname">
           </div>
           <div class="mb-3">
              <label for="dob">Date Of Birth</label>
              <input type="text" class="form-control" id="dob" placeholder="Enter Your dob" name="dob">
           </div>

           <div class="mb-3">
              <label for="specialty">Area of Expertise</label>
              <select class="form-control" id="specialty" name="specialty">
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $r['specialty_id'] ?>">  <?php echo $r['name']; ?> </option>
               <?php }  ?>
               </select>
            </div>

           <div class="mb-3">
               <label for="email">Email address</label>
                <input required  type="email" class="form-control" id="email"  name="email"  aria-describedby="emailHelp" placeholder="Enter you email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
           </div>
           <div class="mb-3">
               <label for="phone">Contact Number</label>
                <input required  type="text"  class="form-control" id="phone"  name="phone" aria-describedby="emailHelp" placeholder="Enter you number">
                <div id="honeHelp" class="form-text">We'll never share your number with anyone else.</div>
           </div>

      <button type="submit" name="submit"  class="btn btn-primary btn-block">Submit</button>

    </form>
      <br>
      <br>
      <br>
   <?php require_once 'includes/footer.php' ?>