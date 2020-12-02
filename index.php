<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vue JS Note App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <div id="app">
        <div class="container mt-4">
            <div class="card card-body mt-2">
                <div class="page-header">
                    <a href="index.php"><h2 class="title">Vue JS Note App</h2></a>
                    <div class="card card-body" v-if="errorText.length > 0">
                        <div class="alert alert-danger">
                            {{ errorText }}
                        </div>
                    </div>
                    <div class="card card-body" v-if="successText.length > 0">
                        <div class="alert alert-success">
                            {{ successText }}
                        </div>
                    </div>
                </div>
                <div class="row add-form mt-2">
                    <div class="col-md-4">
                        <input type="text" v-model="title" class="form-control" placeholder="Enter Note Title">
                        <br>
                        <button class="btn btn-success btn-block" @click="adNote">Add New Note</button>
                    </div>
                    <div class="col-md-8">
                        <textarea v-model="description" cols="30" rows="3" class="form-control" placeholder="Enter Note Note Description"></textarea>
                    </div>
                </div>

                <div class="filter-notes">
                    <input type="text" v-model="search" class="float-right mt-2 search-form" 
                    placeholder="Please search by note title or Description" @input="searchWork">
                    <div class="clearfix"></div>
                </div>

                <table class="table table-bordered mt-3">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(note, index) in notes.data">
                            <td>{{ index + 1 }}</td>
                            <td>{{ note.title }}</td>
                            <td width="50%">{{ note.description }}</td>
                            <!-- <td>{{ str_limit('note.description', 50) }}</td> -->
                            <td>
                                <button @click="deleteNote(note.id)" class="btn btn-danger mb-2">Del</button>
                                <button @click="editNote(note.id)" class="btn btn-success ml-2 mb-2">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Start Bootstrap Edit Modal -->
			<div class="modal" id="editModal">
				<div class="modal-dialog" style="max-width: 50%;">
				    <div class="modal-content">
				      	<!-- Modal Header -->
				    	<div class="modal-header">
				        	<h4 class="modal-title">Edit Note</h4>
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				      	</div>
				      	<!-- Modal body -->
				    	<div class="modal-body">
					      	<div class="col-md-12">
			                    <p>Note Title</p>
			                    <input type="text" v-model="title" class="form-control">
			                </div>
			                <div class="col-md-12 mt-2">
			                    <p>Note Description</p>
			                    <textarea v-model="description" cols="30" rows="5" class="form-control"></textarea>
			                </div>
			                <div class="col-md-12 mt-3">
			                    <button type="button" class="btn btn-success" @click="updateNote">Update Note</button>
			                    <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Close</button>
			                </div>
		        		</div>
			  		</div>
			  	</div>
			</div>
			<!-- End Bootstrap Edit Modal -->

        </div>
    </div>

    <footer class="mt-5"></footer>
    
    
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/vue.js"></script>
    <script type="text/javascript" src="js/axios.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>