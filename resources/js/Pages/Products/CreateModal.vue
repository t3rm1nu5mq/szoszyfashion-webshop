<template>
    <ui-form type="|" item-margin-bottom="16" action-align="center">
        <template #default="{ subitemClass, actionClass }">
            <ui-form-field class="required">
                <label>Input:</label>
                <ui-textfield></ui-textfield>
            </ui-form-field>
            <ui-form-field>
                <label>Select:</label>
                <ui-select></ui-select>
            </ui-form-field>
            <ui-form-field>
                <label>Checkbox:</label>
                <div :class="subitemClass">
                    <ui-form-field v-for="i in 3" :key="i">
                        <ui-checkbox :value="i" :input-id="`checkbox-${i}`"></ui-checkbox>
                        <label :for="`checkbox-${i}`">Checkbox {{ i }}</label>
                    </ui-form-field>
                </div>
            </ui-form-field>
            <ui-form-field>
                <label>Radio:</label>
                <div :class="subitemClass">
                    <ui-form-field v-for="i in 3" :key="i">
                        <ui-radio :value="i" :input-id="`radio-${i}`"></ui-radio>
                        <label :for="`radio-${i}`">Radio {{ i }}</label>
                    </ui-form-field>
                </div>
            </ui-form-field>
            <ui-form-field :class="actionClass">
                <ui-button raised>Mentés</ui-button>
            </ui-form-field>
        </template>
    </ui-form>
</template>

<script>
export default {
    name: "CreateModal",
    data() {
        return {

        }
    }
}
</script>

<style scoped>

</style>
