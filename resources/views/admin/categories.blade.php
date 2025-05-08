@extends('admin.pageprincipale')
@section('contenu')
<div class="container mx-auto px-4 py-6">
    <!-- Heading Section -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Categories</h2>
        <button onclick="openModal()" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow-md hover:bg-blue-700 focus:outline-none">
            Create Category
        </button>
    </div>

    <!-- Modal for Creating Category -->
    <div id="createCategoryModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white rounded-lg w-96 p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Category</h3>
            <form action="" method="post">
                @csrf
            <div>
                <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input id="" type="text" name="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter category name">
            </div>
            <div class="mt-4">
                <label for="categoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="" name="description" class="mt-1 p-2 w-full border border-gray-300 rounded-md" rows="3" placeholder="Enter category description"></textarea>
            </div>
            <div class="mt-6 flex justify-end space-x-2">
                <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
            </div>
            </form>
        </div>
    </div>
    <div class="mt-6 bg-white p-4 rounded-lg shadow-md overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="py-3 px-4 border-b text-left text-sm font-medium text-gray-700">Category Name</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-medium text-gray-700">Description</th>
                    <th class="py-3 px-4 border-b text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody id="categoriesTableBody">
            @foreach($categories as $categorie)
                <tr>
                    <td class="py-3 px-4 border-b text-sm text-gray-700">{{$categorie->name}}</td>
                    <td class="py-3 px-4 border-b text-sm text-gray-700">{{$categorie->description}}</td>
                    <td class="py-3 px-4 border-b text-sm text-gray-700">
                        <button onclick="openModalEdit('{{$categorie->id}}','{{$categorie->name}}','{{$categorie->description}}')" class="text-blue-600 hover:text-blue-800">Edit</button>
                        <form action="" method="post">
                            @method('DELETE')
                            @CSRF
                            <input type="hidden" name="categorie_id" value="{{$categorie->id}}">
                            <button type="submit"    class="text-red-600 hover:text-red-800">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>

<!-- Modal Structure -->
<div id="createCategoryModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-96 p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Create Category</h3>
        <form action="" method="post">
            @csrf
        <div>
            <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
            <input id="categoryName" type="text" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter category name">
        </div>
        <div class="mt-4">
            <label for="categoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="categoryDescription" class="mt-1 p-2 w-full border border-gray-300 rounded-md" rows="3" placeholder="Enter category description"></textarea>
        </div>
        <div class="mt-6 flex justify-end space-x-2">
            <button onclick="closeModal()" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Cancel</button>
            <button onclick="createCategory()" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create</button>
        </div>
        </form>
    </div>
</div>
<div id="editCategoryModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-96 p-6">
        <h3 id="editModalTitle" class="text-lg font-semibold text-gray-700 mb-4">Edit Category</h3>
        <form action="" method="post">
            @csrf
            @method('PUT')

            <div>
                <label for="editCategoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                <input id="editCategoryName" type="text"  name="name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" placeholder="Enter category name">
            </div>
            <div class="mt-4">
                <label for="editCategoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="editCategoryDescription"  name="description" class="mt-1 p-2 w-full border border-gray-300 rounded-md" rows="3" placeholder="Enter category description"></textarea>
            </div>
            <input type="hidden" id="editCategoryId" name="categorie_id" value="" >
            <div class="mt-6 flex justify-end space-x-2">
                <button  onclick="closeModalEdit()" type="button" class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md">Cancel</button>
                <button  onclick  class="px-4 py-2 bg-blue-600 text-white rounded-md">Save Changes</button>
            </div>


        </form>
    </div>
</div>
<script>
    // Function to open the modal
    function openModal() {
        document.getElementById('createCategoryModal').classList.remove('hidden');
    }

    // Function to close the modal
    function closeModal() {
        document.getElementById('createCategoryModal').classList.add('hidden');
    }
    function openModalEdit(id , name , description) {
        document.getElementById('editCategoryName').value = name
        document.getElementById('editCategoryId').value = id


        document.getElementById("editCategoryDescription").value = description
        console.log(description)
        document.getElementById('editCategoryModal').classList.remove('hidden');
    }

    // Function to close the modal
    function closeModalEdit() {
        document.getElementById('editCategoryModal').classList.add('hidden');
    }
</script>
@endsection

