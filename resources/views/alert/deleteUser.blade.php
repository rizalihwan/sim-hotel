<button type="submit" onclick="deleteUser('{{ $account->id }}')" style="background-color: transparent; border: none;"><i class="icon-trash" style="color: red;"></i></button>        
<form action="{{ route('admin.account.register.destroy', $account->id) }}" method="post" id="DeleteUser{{ $account->id }}">
    @csrf
    @method('DELETE')
 </form>                                  
<script>
    function deleteUser(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "is Removing User",
                        showConfirmButton: false,
                        timer: 2300,
                        timerProgressBar: true,
                        onOpen: () => {
                            document.getElementById(`DeleteUser${id}`).submit();
                            Swal.showLoading();
                        }
                    });
                }
        })
    }
</script>