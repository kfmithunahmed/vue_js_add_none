// Start Vue js script
var app = new Vue({
    el : "#app",
    data : {
        title: "",
        description: "",
        selectedNote: 0,
        notes: [],
        errorText: '',
        successText: '',
        search: ''
    },

    mounted(){
    	// Fetch notes from database
    	var vm = this;
    	vm.fetchNotes();
    },
    
    methods: {
        searchWork(){
            let vm = this;
            axios.get('http://localhost/vue_js/api/search.php?search='+vm.search)
            .then(function (response) {
                vm.notes = response.data;
            })
            .catch(function (error) {
                console.log(error);
            })
        },

        adNote(){
            let title = this.title;
            let description = this.description;
            let vm = this;
            if(title.length > 0 && description.length > 0){
               
               	const singleNote = new URLSearchParams();
				singleNote.append('title', title);
				singleNote.append('description', description);
				singleNote.append('author_id', 1);

               	axios.post('http://localhost/vue_js/api/add-note.php', singleNote)
			  	.then(function (response) {
			    	vm.fetchNotes();
			  	})
			  	.catch(function (error) {
			    	console.log(error);
			  	});

				vm.fetchNotes();
                this.title = "";
                this.description = "";
                this.successText = "Note Added Successfully";
                this.errorText = "";                    

            }else{
                this.successText = "";
                this.errorText = "Please Fillup The fill";
                return;
            }
        },
        
        deleteNote(noteIndex){
        	let vm = this;
        	const singleNote = new URLSearchParams();
        	singleNote.append('id', noteIndex);

           	axios.post('http://localhost/vue_js/api/delete-note.php', singleNote)
		  	.then(function (response) {
		  		vm.fetchNotes();
		  	})
		  	.catch(function (error) {
		    	console.log(error);
		  	});
		  	
            vm.successText = "Note Deleted Successfully";
            vm.errorText = "";
        },

        editNote(noteIndex){
        	$('#editModal').modal('show');
        	let vm = this;
        	vm.selectedNote = noteIndex;

        	axios.get('http://localhost/vue_js/api/show-note.php?id='+noteIndex)
    		.then(function (response) {
    			// handle success
    			console.log(response);
				vm.title = response.data.data.title;
				vm.description = response.data.data.description;
			})
			.catch(function (error) {
			    // handle error
			    console.log(error);
			})
		},

		updateNote(){
			let vm = this;

        	const singleNote = new URLSearchParams();
			singleNote.append('title', vm.title);
			singleNote.append('description', vm.description);
			singleNote.append('author_id', 1);
			singleNote.append('id', vm.selectedNote);

        	axios.post('http://localhost/vue_js/api/edit-note.php', singleNote)
		  	.then(function (response) {
		  		vm.fetchNotes();
                vm.title = "";
                vm.description = "";
                vm.successText = "Note Update Successfully";
                vm.errorText = "";
                $('#editModal').modal('hide');
		  	})
		  	.catch(function (error) {
		    	console.log(error);
		  	});
		},

        fetchNotes(){
        	// Fetch notes from database
        	var vm = this;
        	axios.get('http://localhost/vue_js/api/notes.php')
    		.then(function (response) {
    			// handle success
				vm.notes = response.data;
			})
			.catch(function (error) {
			    // handle error
			    console.log(error);
			})
        }
    }
})
// END Vue js script
