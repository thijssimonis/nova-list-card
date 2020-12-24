<template>
    <card class="flex flex-col h-auto">
        <h1 class="text-90 font-normal text-2xl p-4">{{ card.title }}</h1>
        {{ card.view }}
        <table class="table w-full">
            <thead>
                <th v-for="(head, index) in card.heads" :key="index" class="text-left">
                    {{ head }}
                </th>
            </thead>
            <tbody>
                <tr v-for="row in card.rows" :key="row.id">
                    <td
                        v-for="(value, index) in row"
                        :key="row.id + '-' + index"
                        v-html="value"
                        v-if="index !== 'view'"
                    />
                    <td v-if="row.view" class="td-fit text-right pr-6 align-middle">
                        <a
                            :href="row.view"
                            class="cursor-pointer text-70 hover:text-primary mr-3 inline-flex items-center has-tooltip"
                            data-testid="roles-items-0-view-button"
                            dusk="1-view-button"
                            data-original-title="null"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="22"
                                height="18"
                                viewBox="0 0 22 16"
                                aria-labelledby="view"
                                role="presentation"
                                class="fill-current"
                            >
                                <path
                                    d="M16.56 13.66a8 8 0 0 1-11.32 0L.3 8.7a1 1 0 0 1 0-1.42l4.95-4.95a8 8 0 0 1 11.32 0l4.95 4.95a1 1 0 0 1 0 1.42l-4.95 4.95-.01.01zm-9.9-1.42a6 6 0 0 0 8.48 0L19.38 8l-4.24-4.24a6 6 0 0 0-8.48 0L2.4 8l4.25 4.24h.01zM10.9 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-2a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
                                />
                            </svg>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </card>
</template>

<script>
export default {
    props: ['card'],
}
</script>

<style lang="css" scoped>
.card-panel {
    min-height: 150px;
}
</style>
