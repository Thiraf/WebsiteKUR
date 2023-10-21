@push('styles')
<style>
    .close {
        position: absolute;
        top: 0 !important;
        right: 0 !important;
        padding: 15px !important;
    }
</style>
@endpush
<!-- The Modal -->
<div class="modal fade" id="form-confirm-modal">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="" id="formDelete">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" @click="reset" class="close text-right" data-dismiss="modal">&times;</button>
                <input type="hidden" name="item_id" value="">
                <input type="hidden" name="item_url" value="">
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <p>Apakah anda yakin ingin menghapus data tersebut dari daftar?</p>
                                    
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-addon" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Batal</button>
                <button type="submit" class="btn btn-danger btn-addon"><i class="fa fa-trash"></i> Hapus</button>
            </div>
        </form>
            
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).on('click','.delete-item',function(){
            let $form = $("#formDelete")
            let $modal = $("#form-confirm-modal")
            
            let id = $(this).data('id');
            let url = $(this).data('url');

            $form.find('input[name=item_id]').val(id)
            $form.find('input[name=item_url]').val(url)
            $modal.modal('show')

            $form.on('submit',function(e){
                e.preventDefault()
                
                axios.delete($form.find('input[name=item_url]').val())
                    .then(function(response){
                        let data = response.data
                        if(!data.error) {
                            $("#form-confirm-modal").modal('hide')
                            $("#notification").fadeIn();
                            $(".notification-text").text(data.message)

                            app.dataTable.ajax.reload();
                        }
                    })
                    .catch(function(err){
                        console.log(err)
                    })


            });
        
        })
    </script>
@endpush