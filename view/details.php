<?php
require_once($_SERVER['DOCUMENT_ROOT']."/site/controller/toolkit/ToolkitDetails.php");

require_once($_SERVER['DOCUMENT_ROOT']."/site/controller/toolkit/Session.php");
$session = Session::getInstance();

?>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/site/view/structure/header.php');   
    include($_SERVER['DOCUMENT_ROOT'].'/site/view/structure/search.php');   
?>
<section id="contenu">
    <?php
        $bdd = Database::getConnection();
        if($_GET['type'] == "Conflict"){
            ToolkitDetails::displayDetailsConflict($_GET['id']);
        }
        else{
            if($_GET['type'] == "DesignPattern"){
                ToolkitDetails::displayDetailsDesignPattern($_GET['id']);
            }
            else{
                if($_GET['type'] == "Solution"){
                    ToolkitDetails::displayDetailsSolution($_GET['id']);
                }
                else{
                    if($_GET['type'] == "Project"){
                        ToolkitDetails::displayDetailsProject($_GET['id']);
                    }
                    else{
                        echo "Error 404 !!";
                    }
                }
            }
        }
    ?>
    
</section>
<script>
    
</script>
<?php
    include($_SERVER['DOCUMENT_ROOT'].'/site/view/structure/footer.php');   
?>
