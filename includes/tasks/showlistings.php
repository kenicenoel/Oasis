<?php
include_once "../config.php";
include_once "../common.php";


			$minPrice=0;
			$maxPrice= 9999;
      $location="%";


  echo '

  <div id = "container">

  <section id ="content">

    <header class = "highlight">

    </header>
  </section>

  <section id ="content2">
    <header> </header>
    <div id = "toggle-view">
      <p>VIEW:<p>
      <p id="list" class="view"><span class="fa fa-list"> List</span><p>
      <p id="grid" class="view"><span class="fa fa-th"> Grid</span><p>
    </div>
    <!--Show the results as a grid (the default view -->
      <div id="result-cards">
        <?php echo $grid ?>
      </div>

    <!--	Show the results as a list (table)-->
      <div id="table-results">
            <table id="results">
              <thead>
                <tr>
                  <th>Type</th>
                  <th>Address</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Landlord</th>
                </tr>
              </thead>

              <tbody id="info">
                <?php echo $list ?>
              </tbody>
            </table>
      </div>
    <!--Display the Pagination links and information-->
      <div id="pagination-holder"> <?php echo $textline."<br><br>".$navigation ?> </div>

  </section>


  </div>';


?>
