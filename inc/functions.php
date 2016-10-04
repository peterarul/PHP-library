<?php
function get_item_html($id,$item) {
    $get_details = get_item_details($item);
    $output = "<div class='pad col-sm-6 col-md-4'>
    <div class='thumbnail'>
      <img src='" . $item["img"] . "' 
           alt='" . $item["title"] . "'>
      <div class='caption'>
        <h3 class='media_title' style='text-align:center;'>" . $item["title"] . "</h3>
        <p class='card-description'style='text-align:center;'>". $get_details ." </p>
        <p><a href='details.php?id="
        . $id . "' class='btn btn-primary' role='button'>View Details</a></p>
      </div>
    </div>
  </div>";
    return $output;
}

function get_item_details($item){
    
   
    if (strtolower($item["category"]) == "books") {
            $book_details = "<b>Author(s): </b>" . implode(", ",$item["authors"]) . "<br><b>Publisher: </b> " . $item["publisher"] . "<br><b>ISBN: </b>" . $item["isbn"] . "";
            
            return $book_details;
            
    
    } else if (strtolower($item["category"]) == "movies") { 
        $movie_details = "<b>Director:</b> " . $item["director"] . "<br><b>Writer(s):</b> " . implode(", ",$item["writers"]) . "<br><b>Starring:</b> " . implode(", ",$item["stars"]) . "";
        
            return $movie_details;
                        
    } else if (strtolower($item["category"]) == "music") { 
            
            return "Artist: " . $item["artist"];
    
   } 

}

function get_item_wiki_url($item){
    
   
    if (strtolower($item["category"]) == "books") {
            
            $wiki_url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=". urlencode($item["authors"][0]);
            
            return $wiki_url;
            
    
    } else if (strtolower($item["category"]) == "movies") { 
            
            $wiki_url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=". urlencode($item["title"]);
        
            return $wiki_url;
                        
    } else if (strtolower($item["category"]) == "music") { 
            
            $wiki_url = "https://en.wikipedia.org/w/api.php?action=query&prop=extracts&format=json&exintro=&titles=". urlencode($item["artist"]);
        
            return $wiki_url;
            
    
   } 

}


function array_category($catalog,$category) {
    $output = array();
    
    foreach ($catalog as $id => $item) {
        if ($category == null OR strtolower($category) == strtolower($item["category"])) {
            $sort = $item["title"];
            $sort = ltrim($sort,"The ");
            $sort = ltrim($sort,"A ");
            $sort = ltrim($sort,"An ");
            $output[$id] = $sort;            
        }
    }
    
    asort($output);
    return array_keys($output);
}