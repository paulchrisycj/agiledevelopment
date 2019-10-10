<?php
/**
 * Created by PhpStorm.
 * User: chins
 * Date: 2/20/2016
 * Time: 4:45 PM
 */


/**
 * Renders template.
 * @param string $template
 * @param array $data
 */
function render($template, $data = array())
{
    $path = __DIR__ . '/../templates/' . $template . '.php';
    if (file_exists($path)) {
        extract($data);
        require($path);
    }
    else{

        echo "Something went wrong in the rendering of Pages, halting page load.";
        exit;
    }
}


/**
 * @param $cssLink array of css location
 * @param $jsLink array of javascript functions
 * @return string return html
 *
 */
function loadResources($cssLink = array(), $jsLink = array())
{
    $cssList = "";
    $jsList = "";
    $render = "";
    foreach ($cssLink as $key) {
        $cssList .= "<link href=$key " . " rel=\"stylesheet\" type=\"text/css\">\n";
    }

    $render .= $cssList;

    foreach ($jsLink as $key) {
//        XAMPP does not accept link with / ending, php storm accepts ending with / Eg.
        $jsList .= "<script src=$key></script>\n";
    }

    $render .= $jsList;
    return $render;
}

//Used for general session checking, used for manage visitors with no session
function check_session()
{
//    session_start();
    if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//        echo "<script>toastr.warning('No session ID')</script>";
        echo "<div style='background-color: #7f8c8d'>No session</div>";
    }
    else {

//        echo "<script>toastr.success('Welcome User')</script>";
    }

    if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'fail'){
//        echo "<script>toastr.warning('Please Login First')</script>";
//        var_dump($_SESSION['login_status']);
        echo "<div style='background-color: #e74c3c'>Please Try Again, something went wrong.</div>";
        $_SESSION['login_status'] ="";
//        var_dump($_SESSION['login_status']);
    }


    if (isset($_SESSION['query_status']) && $_SESSION['query_status'] == 'OK'){
        echo "<div style='background-color: #2ecc71'>Update Succesfully</div>";
        $_SESSION['query_status'] ="";

    }

    if (isset($_SESSION['query_status']) && $_SESSION['query_status'] == 'fail'){
        echo "<div style='background-color: #e74c3c'>Please Try Again, something went wrong.</div>";
        $_SESSION['query_status'] ="";

    }
}


//Used for Administratuon session checking, used for manage critical features with reroute features if session not valid.
function check_session_admin(){
    session_start();
    if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
//        echo "<script>toastr.warning('No session ID')</script>";
        echo "<div style='background-color: #7f8c8d'>No session</div>";
        $_SESSION['login_status'] = 'fail';
        header("Location: ../html/login.php");
        exit;
    } else {

    }

    if (isset($_SESSION['login_status']) && $_SESSION['login_status'] == 'fail'){
        echo "<div style='background-color: #e74c3c'>Please Try Again, something went wrong.</div>";
        $_SESSION['login_status'] ="";
    }

    if (isset($_SESSION['query_status']) && $_SESSION['query_status'] == 'OK'){

        echo "<div style='background-color: #2ecc71'>Update Succesfully</div>";
        $_SESSION['query_status'] ="";

    }
    if (isset($_SESSION['query_status']) && $_SESSION['query_status'] == 'fail'){
        echo "<div style='color: #e74c3c'>Please Try Again, something went wrong.</div>";
        $_SESSION['query_status'] ="";

    }
}


//Clean String, solve some string with Ampersand issues
function clean($string)
{
    $string = str_replace('&', '&amp;', $string); // Replaces all Ampersand.
    //$string = replaceAccents($string); //Replace Accents, not used in this project.
    return $string;
}

//Fix some of the unicode issues, not used in this project
function replaceAccents($rawString)
{
    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ', 'Ά', 'ά', 'Έ', 'έ', 'Ό', 'ό', 'Ώ', 'ώ', 'Ί', 'ί', 'ϊ', 'ΐ', 'Ύ', 'ύ', 'ϋ', 'ΰ', 'Ή', 'ή');
    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o', 'Α', 'α', 'Ε', 'ε', 'Ο', 'ο', 'Ω', 'ω', 'Ι', 'ι', 'ι', 'ι', 'Υ', 'υ', 'υ', 'υ', 'Η', 'η');
    return str_replace($a, $b, $rawString);
}

?>