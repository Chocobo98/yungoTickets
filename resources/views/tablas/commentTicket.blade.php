<div class="container mt-3">
    <div class="card-body">
        <div class="agregarComment mb-3">
            @csrf
            <textarea class=" form-control comment" placeholder="Ingrese un comentario..."></textarea>
            <button value={{ $comm->idComentario }} class="btn btn-dark btn-sm mt-2 guardarComment">Submit</button>
            
        </div>
    </div>
</div>