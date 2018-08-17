
<?php
require_once("inc/check.php");
//CODE FOR UPDATING POST

try{
 require("inc/db/config.php");
	 if(isset($_POST["edit_post"])){
	 //checking if the edit button is clicked twice
	 $check_btn=$dbh->prepare('SELECT *FROM functions WHERE USERNAME='.$user_login.' AND CATEGORY="POST" AND FUNCTION_ON="YES"');
	 $check_btn->execute();
	 $num_check=$check_btn->rowCount();
	 if($num_check==0){
	 	$select_post=$dbh->prepare('SELECT *FROM post_tbl WHERE ID="'.$post_id.'" AND REMOVED="NO"');
	 	$select_post->execute();
	 	$num_select=$select_post->rowCount();
	 	if($num_select==1){
			$get_post=$select_post->fetch(PDO::FETCH_ASSOC);
			$edit_content=$get_post['CONTENT'];
			
			//INSERT INTO THE FUNCTIONS TBL THAT A POPUP IS ACTIVE 
			$insert_pop=$dbh->prepare("INSERT INTO functions (USERNAME,CATERGORY,FUNCTION_ON,DATE_CLICKED)")
				 	 	$edit_form='
<!-- Modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content modal-sm">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
            </div>
            <!--Body-->
            <div class="modal-body">
              <form method="" action="">
                 <div class="form-group">
                   <textarea name="edit" class="form-control">"'.$edit_content.'"</textarea> 
                 </div>
            
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->
';
		}
		else{
			
		}

	 }
	 else{
	 	
	 }
	}
	catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
}

?>