----------- GET -------------------
via navagedor
https://project-garcia-p2-genesis-robson1990.c9users.io/projetoGET/"nome"

via curl
curl -v -X GET https://project-garcia-p2-genesis-robson1990.c9users.io/projetoGET/"nome"

----------- POST -------------------
via curl
curl -v -X POST https://project-garcia-p2-genesis-robson1990.c9users.io/projetoPOST -H 'Content-Type:application/json' -d o que será inserido=>'{"nome":"Papai Noel","propositor":"Grupo Orgone","objetivo":"peca teatral","cidade":"Guaruja","estado":"MG","meta":8000.00,"deadline":"2016-06-15"}'

----------- DELETE -------------------
via curl
curl -v -X DELETE https://project-garcia-p2-genesis-robson1990.c9users.io/deletarProjeto/"id" -H 'Content-Type:application/json'