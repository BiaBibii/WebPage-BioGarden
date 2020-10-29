
<div id="app-container" class="container">
    <table id="cos" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Produs</th>
            <th style="width:10%">Preț</th>
            <th style="width:8%">Cantitate</th>
            <th style="width:22%" class="text-center">Subtotal</th>
            <th style="width:10%"><a href="#">Sterge tot</a></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-2 hidden-xs"><img width="130%" src="images/castravete.jpg" alt="castravete" class="img-responsive" /></div>
                    <div class="col-sm-10">
                        <h4 class="nomargin">Product 1</h4>
                        <p>Castravete aaaaaaa</p>
                    </div>
                </div>
            </td>

            <td data-th="Price">1.99 lei</td>
            <td data-th="Quantity">
                <input type="number" class="form-control text-center" value="1">
            </td>
            <td data-th="Subtotal" class="text-center">1.99</td>
            <td data-th="sterge" class="text-center"><a href="#">Sterge</a></td>

        </tr>
       
        </tbody>
        <tfoot>

        <tr>
            <td><a href="index.php?action=shop" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continua cumparaturile</a></td>
            <td colspan="2" class="hidden-xs"></td>
            <td class="hidden-xs text-center"><strong>Total 1.99 lei</strong></td>
            <!-- <td><a href="#" class="btn btn-success btn-block" id="comandaBtn" onclick="showForm()">Comanda <i class="fa fa-angle-right"></i></a></td> -->
            <td><button type="button" data-toggle="modal" data-target="#edit" data-whatever="@edit">Comanda</button> </td>
        </tr>
        </tfoot>
    </table>
   <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Datele personale</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="name" class="col-form-label">Nume:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                       
                        <div class="form-group">
                            <label for="price" class="col-form-label">Prenume:</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                         <div class="form-group">
                            <label for="description" class="col-form-label">Adresa:</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-form-label">Numar de telefon:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="col-form-label">Adresa de email:</label>
                            <input type="text" class="form-control" id="quantity" name="quantity">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Înapoi</button>
                    <button type="button" class="btn btn-success" onclick="update()">Trimite comanda</button>
                </div>
            </div>
        </div>
    </div>
	
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstraps JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


    <script>
       <script>
		$(document).ready(function(){
		   function showForm() {
            document.getElementById('formular').style.display = 'block';
    }

    });
	</script>



