<?php include('server.php');
include("templates/header4.php") ?>


<section class="container grey-text">
<h4 class="center" style="color: #829dac;">Chosse Your Plan</h4>
<form action="credit.php">
    <p>
      <label>
        <input name="group1" type="radio" checked />
        <span>One-Month (1,000 EGP)</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" />
        <span>Three-Months (2,400 EGP)</span>
      </label>
    </p>
    <p>
      <label>
        <input name="group1" type="radio" />
        <span>One-Year (7,200 EGP)</span>
      </label>
    </p>
    <div class="center">
            <input type="submit" name="sub" value="Submit" class="btn brand z-depts-0">
        </div>
  </form>
</section>
</body>
<?php include("templates/footer.php"); ?>