----------- GET -------------------
via navagedor
https://project-garcia-p2-genesis-robson1990.c9users.io/projetoGET/"nome"

via curl
curl -v -X GET https://project-garcia-p2-genesis-robson1990.c9users.io/projetoGET/"nome"

----------- POST -------------------
via curl
curl -v "Content-Type:application/json"\ "Accept: application/json" \ -X POST  -d '{"id":,"nome":"Canalha","propositor":"Grupo Orgone","objetivo":"peca teatral","cidade":"Guaruja","estado":"MG","meta":8000.00,"deadline":"2016-06-15"}' https://project-garcia-p2-genesis-robson1990.c9users.io/projetoPOST
curl https://project-garcia-p2-genesis-robson1990.c9users.io/projetoPOST / -v / -X POST / -H 'content-type:application/json' / -d '{"nome":"Canalha","propositor":"Grupo Orgone","objetivo":"peca teatral","cidade":"Guaruja","estado":"MG","meta":8000.00,"deadline":"2016-06-15"}'

curl -v -X POST https://project-garcia-p2-genesis-robson1990.c9users.io/projetoPOST -H 'Content-Type:application/json' \ -d '{"nome":"Canalha","propositor":"Grupo Orgone","objetivo":"peca teatral","cidade":"Guaruja","estado":"MG","meta":8000.00,"deadline":"2016-06-15"}'
----------- DELETE -------------------
via curl
curl -v -X DELETE https://project-garcia-p2-genesis-robson1990.c9users.io/deletarProjeto/5 -H 'Content-Type:application/json'