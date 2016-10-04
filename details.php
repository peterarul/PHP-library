<?php 
include("inc/data.php");
include("inc/functions.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if (isset($catalog[$id])) {
        $item = $catalog[$id];
    }
}

if (!isset($item)) {
    header("location:catalog.php");
    exit;
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>
<div class="container">
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <h3><?php echo $item["title"]; ?></h3>
        <hr>
        <img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" class="img-responsive center-block"/>
      </div>
    </div>
    </div>
     
    <div class="col-md-4">
        <div class="panel panel-default">
      <div class="panel-heading">
          <h4>Details</h4>
      </div>
      <div class="panel-body">
        
          <table>
            
                <tr>
                    <th>Category:&nbsp;&nbsp;</th>
                    <td><?php echo $item["category"]; ?></td>
                </tr>
                <tr>
                    <th>Genre:</th>
                    <td><?php echo $item["genre"]; ?></td>
                </tr>
                <tr>
                    <th>Format:</th>
                    <td><?php echo $item["format"]; ?></td>
                </tr>
                <tr>
                    <th>Year:</th>
                    <td><?php echo $item["year"]; ?></td>
                </tr>
                <?php if (strtolower($item["category"]) == "books") { ?>
                <tr>
                    <th>Authors:</th>
                    <td><?php echo implode(", ",$item["authors"]); ?></td>
                </tr>
                <tr>
                    <th>Publisher:</th>
                    <td><?php echo $item["publisher"]; ?></td>
                </tr>
                <tr>
                    <th>ISBN:</th>
                    <td><?php echo $item["isbn"]; ?></td>
                </tr>    
                <?php } else if (strtolower($item["category"]) == "movies") { ?>
                <tr>
                    <th>Director:</th>
                    <td><?php echo $item["director"]; ?></td>
                </tr>
                <tr>
                    <th>Writers:</th>
                    <td><?php echo implode(", ",$item["writers"]); ?></td>
                </tr>
                <tr>
                    <th>Stars:</th>
                    <td><?php echo implode(", ",$item["stars"]); ?></td>
                </tr>
                <?php } else if (strtolower($item["category"]) == "music") { ?>
                <tr>
                    <th>Artist:</th>
                    <td><?php echo $item["artist"]; ?></td>
                </tr>
                <?php } ?>
            </table>
        
        
      </div>
    </div>
    </div>
   
  <!--  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-body">
       
          <form method="POST" action="">

            <div id="payment-form"></div>
            <input name="gig_id" value="{{ gig.id }}" hidden>
            <button type="submit" class="btn btn-success btn-block btn-raised" name="button">ORDER NOW</button>
          </form>
          <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
          <script src="https://js.braintreegateway.com/v2/braintree.js"></script>
          <script>
          $(document).ready(function() {
             var clientToken = "";
              braintree.setup(clientToken, "dropin", {
                container: "payment-form"
              });
            });

          </script>
      </div>
    </div>
    
</div> -->
<div class="col-md-8">
    <div class="panel panel-default">
      <div class="panel-body">
        <h3><?php echo "About" ?></h3>
        <hr>
        <?php
          $google_search_url = "http://www.google.com/search?q=". urlencode($item["title"]);
          $url = get_item_wiki_url($item);
          $json = file_get_contents($url);
          $json = utf8_encode($json);  
          $json_data = json_decode($json);
            foreach($json_data->query->pages as $k)
            {
                if ($k->extract == "" || $k->extract == null){
                    echo "&nbsp;<a target='_blank' href='".$google_search_url."'>Google Search </a>&nbsp;";
                } else {
                    echo $k->extract;
                    echo "<br>&nbsp;<a target='_blank' href='".$google_search_url."'>Google Search </a>&nbsp;";
                }
                
            }
          ?>
      </div>
    </div>
    </div>
</div>   
<?php include("inc/footer.php"); ?>  
        
    
        
            

    
   