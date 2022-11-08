<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="<?php echo URL::to('/public/dist/js/app.js') ?>"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>


<script>


function supprimerLigne(id){

    Swal.fire({
    title: 'Confirmer la suppression ?',
    text: "Voulez-vous supprimer la ligne selectionnée ?",
    icon: 'warning',
    showClass: {
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    },
    showCancelButton: true,
    confirmButtonColor: '#CC9933',
    cancelButtonColor: '#000038',
    confirmButtonText: 'Oui, Supprimer !',
    cancelButtonText: 'Annuler'
    }).then((result) => {
    if (result.isConfirmed) {
        let action = $("#actionSuppression").val();
        window.location.href =action+'/'+id;
    }
    });
}
</script>