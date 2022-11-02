<?= $data['title']; ?>

<form action="<?= URLROOT; ?>/denemeler/create" method="post">
    <table>
        <tbody>
            <tr>
                <td>
                    <label for="ad">ad</label>
                    <input type="text" name="ad" id="ad">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="soyad">soyad</label>
                    <input type="text" name="soyad" id="soyad">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="yer">yer</label>
                    <input type="text" name="yer" id="yer">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="hidden" name="id">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Verzenden">
                </td>
            </tr>
        </tbody>
    </table>
</form>