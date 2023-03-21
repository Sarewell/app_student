<div class =" overflow-x-auto">
    <table class="table table-zebra w-full">
        <thead>
            <tr>
                <th>id</th>
                <th>prenom</th>
                <th>nom</th>
                <th>Formation</th>
                <th>voir</th>
                <th>modifier</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($students as $student){ ?>
                <tr>
                    <th><?= $student['id'] ?></th>
                    <th><?= $student['fname'] ?></th>
                    <th><?= $student['lname'] ?></th>
                    <th><?= $student['formation']  ?></th>
                    <th><a href="show-etudiant.php?id=<?= $student['id'] ?>"><i class="fa-solid fa-eye"></i></a></th>
                    <th><i class="fa-solid fa-pencil"></i></th>
                </tr>

            <?php } ?>
        </tbody>

    </table>