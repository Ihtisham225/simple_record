<template>
    <div v-if="$page.props.flash.success">
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{ $page.props.flash.success }}</p>
            <p class="text-sm">Recored have been changed successfully.</p>
        </div>
    </div>

    <div v-if="$page.props.flash.error">
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
                Opps! {{ $page.props.flash.error }}
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
                <p>Something went wrong.</p>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    
}
</script>