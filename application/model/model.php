<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all songs from database
     */
    public function logla()
    {
        $sql = "INSERT INTO log (log_ayrinti) VALUES (:ayrinti)";
        $query = $this->db->prepare($sql);

        $parameters = array(':ayrinti' => "Deneme");

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

    }
    /**
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }



    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     *
     *  public function getAmountOfSongs()
     *  {
     *      $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
     *      $query = $this->db->prepare($sql);
     *      $query->execute();
     *
     *        // fetch() is the PDO method that get exactly one result
     *      return $query->fetch()->amount_of_songs;
     *}*/


        public function getAmountOfImages()
        {
            $sql = "SELECT COUNT(pic_id) AS amount_of_images FROM pics";
            $query = $this->db->prepare($sql);
            $query->execute();

             // fetch() is the PDO method that get exactly one result
           return $query->fetch()->amount_of_images;
        }

    /**
     * Get all pictures from database
     */
    public function getAllPics($limit,$offset)
    {
        $sql = "SELECT pic_id, pic_name, big_url, thumbs_url, yayin_tarihi, aktif FROM pics ORDER BY pic_id DESC LIMIT $limit OFFSET $offset";

        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getAllActivePics($arguments = array())//Var
    {
      // set defaults
        $arguments = array_merge(array(
          "random" => false,
          "search" => "",
          "take" => 20,
          "skip" => 0
        ), $arguments);

        $random = $arguments["random"];
        $search = $arguments["search"];
        $take = $arguments["take"];
        $skip = $arguments["skip"];
        $sql = "SELECT pic_id, pic_name, big_url, thumbs_url, aktif FROM pics WHERE aktif = true AND yayin_tarihi <= CURDATE() AND pic_name like '%$search%' ORDER BY yayin_tarihi DESC LIMIT $take OFFSET $skip";

        $query = $this->db->prepare($sql);
        $query->execute();
        $dizi = $query->fetchAll();
        if($random){
        shuffle($dizi);
        return array_slice($dizi,0,$take,true);
        }
        else {
        return array_slice($dizi,0,$take,true);
        }
    }

    public function getPicInfo($id)
    {
        $sql = "SELECT pic_id,size, pic_name, big_url, thumbs_url, yayin_tarihi, aktif FROM pics  WHERE pic_id = :pcid LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':pcid' => $id);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function getPicInfoByName($name)
    {
        $sql = "SELECT pic_id,size, pic_name, big_url, thumbs_url, yayin_tarihi, aktif FROM pics  WHERE pic_name = :pcname LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':pcname' => $name);

        $query->execute($parameters);
        return $query->fetch();
    }

    public function addImg($img)
    {
      $r =explode("/",$img);
      $namewext = end($r);
      $name= explode(".",$namewext)[0];
        $sql = "INSERT INTO pics (pic_name, size, big_url, thumbs_url,pic_category_id,pic_owner_id,user_id,yayin_tarihi) VALUES (:imgname, 150,:imgnamewextbig,:imgnamewextthmp,1, 1,1,CURDATE())";
        $query = $this->db->prepare($sql);
        $parameters = array(':imgname' => $name, ':imgnamewextbig' => URL . "img/big/". $namewext, ':imgnamewextthmp' => URL . "img/thumbs/".$namewext);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    public function listimages(){

      $directory = "img/thumbs/*";
      $images = glob("" . $directory . "*.{[jJ][pP][gG],[pP][nN][gG],[gG][iI][fF]}",GLOB_BRACE);

      $listed = array();

      foreach ($images as $file => $value) {
        $listed[$file] = URL . $value;
      }

      $listed = array_slice($listed, 0, 20);
      return $listed;
    }


    function resize($img,$imgext){

      //only if you script on another folder get the file name
      $r =explode("/",$img);
      $name=end($r);

      //new folder
      $vdir_upload = "img/thumbs/";
      list($width_orig, $height_orig) = getimagesize($img);
      //ne size

      $dst_height = $height_orig/3;
      $dst_width = $width_orig/3;
      $im = imagecreatetruecolor($dst_width,$dst_height);

      switch ($imgext) {
        case 'png':
          $image = imagecreatefrompng($img);
          break;
        case 'jpg':
          $image = imagecreatefromjpeg($img);
        break;
          case 'gif':
            $image = imagecreatefromgif($img);
        break;
        default:
        # code...
        break;
      }

      imagecopyresampled($im, $image, 0, 0, 0, 0, $dst_width, $dst_height, $width_orig, $height_orig);
      //modive the name as u need

      switch ($imgext) {
        case 'png':
          imagepng($im,$vdir_upload . $name);
          break;
        case 'jpg':
          imagejpeg($im,$vdir_upload . $name);
          break;
        case 'gif':
          imagegif($im,$vdir_upload . $name);
          break;
        default:
          # code...
          break;
        }
        //save memory
    imagedestroy($im);
  }

  public function updateImg($picid, $picname, $picbigurl, $picthmburl, $yayin_tarih, $aktif)
  {
      $sql = "UPDATE pics SET pic_name = :picname, big_url = :picbigurl, thumbs_url = :picthmpurl, yayin_tarihi = :tarih, aktif = $aktif WHERE pic_id = :pic_id";
      $query = $this->db->prepare($sql);
      $parameters = array(':picname' => $picname, ':picbigurl' => $picbigurl, ':picthmpurl' => $picthmburl, ':pic_id' => $picid,
      ':tarih' =>  date('Y-m-d',strtotime($yayin_tarih)));

      // useful for debugging: you can see the SQL behind above construction by using:
      //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query->execute($parameters);
  }

  public function deleteImg($img_id)
  {
      $sql = "DELETE FROM pics WHERE pic_id = :pic_id";
      $query = $this->db->prepare($sql);
      $parameters = array(':pic_id' => $img_id);

      // useful for debugging: you can see the SQL behind above construction by using:
      // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

      $query->execute($parameters);
  }

  public function findUser($username,$psswrd){
    $sql = "SELECT * FROM user WHERE username = :username AND password = :password ";
    $query = $this->db->prepare($sql);
    $parameters = array(':username' => $username, ':password' => $psswrd);

    // useful for debugging: you can see the SQL behind above construction by using:
    // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

    $query->execute($parameters);

    // fetch() is the PDO method that get exactly one result
    return $query->fetch();
  }

}
