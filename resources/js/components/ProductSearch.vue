<template>
    <ais-instant-search :search-client="searchClient" index-name="products">

        <div class="d-flex flex-row bd-highlight">

            <div class="bd-highlight">
                <ais-search-box />
            </div>
            <div class="bd-highlight">
                <ais-refinement-list attribute="category_name" />
            </div>
        </div>

        <ais-hits>
            <table class="table" slot-scope="{ items }">
                <thead>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    <tr v-for="item in items" :key="item.objectID">
                        <td><a :href="item.path">{{ item.name }}</a></td>
                        <td>{{ item.category_name }}</td>

                        <td>
                            <a title="Edit Product" :href="item.path +'/edit'"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-link" title="Delete Product" data-toggle="modal" :data-target="'#confirmDeleteProduct' + item.id">
                                <i class="fas fa-trash"></i>
                            </button>

                            <confirm-delete-modal
                                    :title="'Delete ' + item.name"
                                    message="Deleting this product will also delete all of its drivers and bioses. Are you sure?"
                                    :delete-url="item.path"
                                    :data-target="'confirmDeleteProduct' + item.id">
                            </confirm-delete-modal>

                        </td>
                    </tr>
                </tbody>
            </table>
        </ais-hits>

    </ais-instant-search>
</template>

<script>
    import algoliasearch from 'algoliasearch/lite';
    import ConfirmDeleteModal from './ConfirmDeleteModal.vue';

    export default {
        data() {
            return {
                searchClient: algoliasearch(
                    'QSNN8ASQHI',
                    'bc0666340d33ca78c9e399c9e63ad3ee'
                ),
            };
        },
    };
</script>

<style>
    .ais-RefinementList-list {
        list-style-type: none;
    }
</style>

