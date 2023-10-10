<script>
    $(document).ready(function() {
        // Load settings from Local Storage
        const storedSettings = JSON.parse(localStorage.getItem("website-settings"));
        if (storedSettings) {
            $("#title").val(storedSettings.title);
            $("#description").val(storedSettings.description);
            $("#theme").val(storedSettings.theme);
            $("#maintenance_mode").prop("checked", storedSettings.maintenance_mode === "true");
        }

        // Save settings to Local Storage when the "Save Settings" button is clicked
        $("#save-settings-btn").click(function() {
            const settings = {
                title: $("#title").val(),
                description: $("#description").val(),
                theme: $("#theme").val(),
                maintenance_mode: $("#maintenance_mode").is(":checked").toString(),
            };

            // Save settings to Local Storage
            localStorage.setItem("website-settings", JSON.stringify(settings));

            alert("Settings saved successfully!");
        });
    });
</script>