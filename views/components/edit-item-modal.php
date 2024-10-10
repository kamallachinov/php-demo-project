<?php require "../db/db-connection.php";?>
<?php  $showModal = !empty($editErrors['imageUrl']) || !empty($editErrors['title']) || !empty($editErrors['desc']);?>

<div id="editModal"
    class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center <?= $showModal ? '' : 'hidden'; ?>">
    <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
        <h2 class="text-lg font-bold mb-4">Edit item</h2>

        <!-- <?php if (!empty($dbError)): ?>
        <p class="text-red-600"><?= htmlspecialchars($dbError) ?></p>
        <?php endif; ?> -->
        <form method="POST">
            <div class="mb-4">
                <label for="imageUrl" class="block text-sm font-medium text-gray-700">Image URL</label>
                <input type="text" id="imageUrl" name="imageUrl" value="<?= htmlspecialchars($imageUrl) ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" />
                <?php if (!empty($editErrors['imageUrl'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= htmlspecialchars($editErrors['imageUrl']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                <?php if (!empty($editErrors['title'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= htmlspecialchars($editErrors['title']) ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3"
                    class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500"><?= htmlspecialchars($desc) ?></textarea>
                <?php if (!empty($editErrors['desc'])): ?>
                <p class="text-red-600 text-sm mt-1"><?= htmlspecialchars($editErrors['desc']) ?></p>
                <?php endif; ?>
            </div>
            <div class="flex justify-end">
                <button type="button" id="closeEditModal"
                    class="mr-2 bg-gray-400 px-3 py-2 rounded text-white">Cancel</button>
                <button type="submit" id="submit-edit-btn" name="submitEditModal"
                    class="bg-blue-500 px-3 py-2 rounded text-white">Submit</button>
            </div>
        </form>
    </div>
</div>

<script>
// function openEditModal(id, imageUrl, title, description) {
//     const modal = document.getElementById('editModal');
//     const imageUrlField = document.getElementById('imageUrl');
//     const titleField = document.getElementById('title');
//     const descriptionField = document.getElementById('description');

//     imageUrlField.innerHTML = imageUrl;
//     titleField.innerHTML = title;
//     descriptionField.innerHTML = description;

//     modal.classList.remove('hidden');
// }

// document.getElementById('closeEditModal').addEventListener('click', function() {
//     document.getElementById('editModal').classList.add('hidden');
// });
</script>