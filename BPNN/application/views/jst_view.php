
  <body>


  <div class="container">
    <h1>Neural Network Backpropagation <small> (Untuk  Memprediksi Prestasi Siswa) </small></h1>

    <!--<button class="btn btn-success" onclick="add_book()"><i class="glyphicon glyphicon-plus"></i> Add Book</button>-->
    <center><h3>Data Latih</h3></center>
    <table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>X1</th>
            <th>X2</th>
            <th>X3</th>
            <th>X4</th>
            <th>Target</th>
          </tr>
        </thead>
        <tbody>
        <?php
          for ($i=0; $i < count($varX); $i++) {           
        ?>
          <tr>
            <td><?php echo $i+1; ?></td>
              <?php 
              for ($j=0; $j < count($varX[$i]); $j++) { 
              ?>
                  <td><?php echo $varX[$i][$j]; ?></td>
              <?php
              }
              ?>
            <td><?php echo $varTarget[$i] ?></td>

          </tr>

        <?php
          }
        ?>
        </tbody>
    </table>
    <hr>
    <div class="col-xs-12" style="padding:0px; margin-bottom:20px;">
      <a href="<?php echo base_url("traindata"); ?>" class="btn btn-primary" style="width: 100%">MULAI PELATIHAN!</a>
    </div>
    

    <!--<table id="table_id" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
					<th>Book ID</th>
					<th>Book ISBN</th>
					<th>Book Title</th>
					<th>Book Author</th>
					<th>Book Category</th>

          <th style="width:125px;">Action
          </p></th>
        </tr>
      </thead>
      <tbody>
				<?php foreach($books as $book){?>
				     <tr>
				         <td><?php echo $book->book_id;?></td>
				         <td><?php echo $book->book_isbn;?></td>
								 <td><?php echo $book->book_title;?></td>
								<td><?php echo $book->book_author;?></td>
								<td><?php echo $book->book_category;?></td>
								<td>
									<button class="btn btn-warning" onclick="edit_book(<?php echo $book->book_id;?>)"><i class="glyphicon glyphicon-pencil"></i></button>
									<button class="btn btn-danger" onclick="delete_book(<?php echo $book->book_id;?>)"><i class="glyphicon glyphicon-remove"></i></button>


								</td>
				      </tr>
				     <?php }?>



      </tbody>

      <tfoot>
        <tr>
          <th>Book ID</th>
          <th>Book ISBN</th>
          <th>Book Title</th>
          <th>Book Author</th>
          <th>Book Category</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>-->

  </div>

</body>
