<script language= "text/javascript">
   var array = new Array();
   var sub1 = new Array();
   var sub2 = new Array();
   var consequencia = new Array();
   var classific;
   sub1.push(1,1,2,2,8,8,12,12,12,12,12,12,12,12,12,12,13,13,13,13,13,13,13,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,14,15,15,15,15,15,15,16,16,17,17,18,19,19,19,19,21,21,21,21,21,21,21,21,21,21,22,22,22,23,23,23,23,23,23,23,24,24,25,25,25,25,25,25,25,25,25,32,32,35,38,38,38,38,38,39,39,39,39,39,39,39,39,39,39,39,40,41,41,42,44,47,49,49,49,50,50,50,50,50,50,50,52,52,52,52,53,53,54,54,54,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,60,66,66,66,66,66,66,66,68,68,71,71,71,71,71,71,71,72,72,72,72,72,72,72,72,72,72,71,77,77,77,79,79,79,79,79,80,80,80,80,80,80,81,81,81,82,82,82,82,82,82,89,90,91,92,92,92,92,92,92,95,95,95,95,95,95,95,95,95,95,95,98,98,98,98,98,98,98,98,98,98,98,98,98,98,98,99,99,99,99,99,99,99,104,104104,104,106,106,106,106,106,106,107,107,110,110,110,110,110,110,111,111,111,111,111,111,111,112,112,112,112,112,114,114,114,114,114,114,116,116,116,116,116,116,116,117,117,117,117,118,119,119,125,127,127,129,129,129,129,130,133,133,133,134,137,141,142,142,142,142,145,145,146,148,153,154,154,154,154,155,155,157,157,157,157,157,159,160,164,165,166,166,169,169,170,170,170,170,171,171,176,182,183,187,188,190,191);

   sub2.push(39,148,89,6,39,13,16,27,23,16,19,17,160,157,190,155,14,157,25,39,52,50,169,22,25,21,146,142,154,166,169,170,175,176,182,192,164,165,171,189,191,39,41,47,49,52,54,15,47,50,6,39,53,25,188,191,191,188,22,22,191,22,188,22,41,164,165,39,50,176,48,54,47,191,53,146,165,175,164,162,39,51,188,55,142,154,166,175,176,191,142,50,39,47,55,142,167,55,142,55,84,182,50,25,49,6,47,52,146,164,165,89,176,39,53,142,191,191,31,50,47,54,47,133,138,166,175,176,191,47,142,89,90,137,136,47,146,191,92,95,106,82,90,89,116,98,82,119,135,138,142,125,133,136,137,150,154,116,95,90,125,89,146,133,142,92,72,96,90,98,89,142,153,110,92,82,98,99,84,136,137,135,133,150,129,116,137,133,116,89,72,129,116,84,99,114,110,130,98,107,133,106,129,114,116,133,137,142,89,106,95,129,119,106,90,89,119,91,106,90,89,125,130,138,146,153,154,89,95,91,106,107,114,116,119,125,129,135,138,136,137,154,111,116,89,108,114,133,142,72,184,125,110,125,135,138,142,137,154,114,148,114,116,111,133,142,134,90,116,117,125,89,133,145,60,89,72,125,184,125,130,89,84,137,146,129,130,84,133,134,137,150,133,134,125,130,142,142,154,133,89,137,135,90,89,133,84,134,137,142,133,133,142,143,167,189,166,164,165,165,157,191,175,189,170,166,188,191,175,162,164,188,165,191,188,191,191,175,189,191,170,175,176,182,189,187,191,191,191,188,191,190,191,189);

   consequencia.push('O que acontece: O uso concomitante de acetilcisteína e a carbamazepina pode resultar em níveis subterapêuticos carbamazepina.',
'O uso concomitante de acetilcisteína e NITROGLICERINA podem resultar num aumento hipotensão e dor de cabeça induzida por nitroglicerina.',
'O uso concomitante de aciclovir e fenitoína pode resultar em concentrações plasmáticas de fenitoína diminuiu e potencial aumento da atividade de apreensão.',
'O uso concomitante de aciclovir e Ácido valpróico pode resultar em concentrações plasmáticas diminuíram ácido valpróico e potencial aumento da atividade de apreensão.',
'O uso concomitante de albendazol e carbamazepina pode resultar em concentrações diminuídas de albendazol.',
'O uso concomitante de albendazol e teofilina pode resultar em um aumento do risco de toxicidade pela teofilina (náuseas, vômitos, palpitações, convulsões).',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e bloqueadores não-despolarizante NEUROMUSCULAR podem resultar num aumento e / ou prolongado bloqueio neuromuscular que pode levar à depressão respiratória e paralisia.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de aminoglicosídeos e nondepolarizing NEUROMUSCULAR bloqueadores podem resultar num aumento e / ou prolongado bloqueio neuromuscular que pode levar à depressão respiratória e paralisia.',
'O uso concomitante de AMICACINA e VANCOMICINA  pode resultar em ototoxicity e / ou nefrotoxicidade aditiva.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de amiodarona e teofilina pode resultar em toxicidade teofilina (náuseas, vômitos, palpitações, convulsões).',
'O uso concomitante de teofilina e pancurônio pode resultar em eficácia pancurônio diminuiu.',
'O uso concomitante de azitromicina e teofilina pode resultar em concentrações séricas de teofilina aumento.',
'O uso concomitante de carbamazepina e broncodilatadores derivados da xantina pode resultar em diminuição eficácia e da exposição à teofilina e diminuição da eficácia e da exposição a carbamazepin.',
'O uso concomitante de benzodiazepinas e teofilina pode resultar em eficácia benzodiazepina diminuiu.',
'O uso concomitante de teofilina e ciprofloxacina pode resultar em concentrações elevadas de teofilina no plasma, prolongamento da meia-vida de eliminação de teofilina e toxicidade teofilina (náuseas, vômitos, palpitações, convulsões).',
'O uso concomitante de ranitidina e teofilina pode resultar em toxicidade teofilina (náuseas, vômitos, palpitações, convulsões).',
'O uso concomitante de amiodarona e beta-bloqueadores adrenérgicos podem resultar em hipotensão, bradicardia, ou parada cardíac.',
'O uso concomitante de azitromicina e agentes antiarrítmicos de classe III pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes, parada cardíaca).',
'O uso concomitante de amiodarona e Bloqueadores dos Canais de cálcio pode resultar em bradicardia, bloqueio atrioventricular e/ou paragem sinusal.',
'O uso concomitante de amiodarona e NIMODIPINA pode resultar em aumento dos níveis séricos nimodipine.',
'O uso concomitante de morfina e SELECIONADO P-inibidores da glicoproteína pode resultar em aumento da exposição morfina.',
'O uso concomitante de amiodarona e CYP1A2 substratos e AGENTES prolongam o intervalo QT pode resultar em aumento da exposição substrato CYP1A2; aumento do risco de prolongamento do intervalo Q.',
'O uso concomitante de amiodarona e prolongam o intervalo QT AGENTES pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de amiodarona e ranitidina pode resultar em aumento da exposição a amiodarona.',
'O uso concomitante de amiodarona e prolongam o intervalo QT AGENTES pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de amiodarona e prolongam o intervalo QT AGENTES pode resultar em aumento do risco de prolongamento do intervalo Q.',
'O uso concomitante de amiodarona e sinvastatina pode resultar em aumento da exposição à simvastatina e um risco aumentado de miopatia ou rabdomiólise.',
'O uso concomitante de amiodarona e sulfametoxazol pode resultar em aumento da exposição sulfametoxazol e um risco aumentado de cardiotoxicidade (prolongamento do intervalo QT, torsade de pointes, parada cardíaca).',
'O uso concomitante de vasopressina e classe III de agentes antiarrítmicos pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes, parada cardíaca).',
'O uso concomitante de amiodarona e CYP1A2, CYP2C9, CYP2D6, CYP3A4 e substratos P-gp pode resultar em aumento da CYP1A2, CYP2C9, CYP2D6, CYP3A4, ou exposição substrato P-gp.',
'O uso concomitante de amiodarona e selecione indutores do CYP3A4 pode resultar em diminuição da exposição de amiodarona.',
'O uso concomitante de amiodarona e rivaroxabana pode resultar em aumento da concentração plasmática rivaroxaban e aumento do risco de hemorragia.',
'O uso concomitante de amiodarona e CYP1A2, CYP2C9, CYP2D6, CYP3A4 e substratos P-gp pode resultar em aumento da CYP1A2, CYP2C9, CYP2D6, CYP3A4, ou exposição substrato P-gp.',
'O uso concomitante de amiodarona e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de carbamazepina e substratos selecionados do CYP3A4 pode resultar na diminuição da exposição dos substratos do CYP3A.',
'O uso concomitante de amiodarona e beta-bloqueadores adrenérgicos podem resultar em hipotensão, bradicardia, ou parada cardíaca.',
'O uso concomitante de amiodarona e cetoconazol pode resultar em concentrações plasmáticas aumentadas de amiodarona e um risco aumentado de cardiotoxicidade (prolongamento QT, torsades de pointes, parada cardíac.',
'O uso concomitante de amiodarona e CILOSTAZOL pode resultar em aumento da exposição amiodarona e cilostazo.',
'O uso concomitante de amiodarona e clonazepam pode resultar em toxicidade clonazepam (confusão, fala arrastada, enurese).',
'Bom uso concomitante de amiodarona e clopidogrel pode resultar na inibição ineficaz da agregação plaquetári.',
'O uso concomitante de amiodarona e substrados de CYP1A2 substratos e agentes que prolongam o intervalo QT pode resultar em aumento da exposição do substrato de CYP1A2; aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de amitriptilina e cetoconazol pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de amitriptilina e ciprofloxacina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de amitriptilina e Ácido valpróico pode resultar em aumento do risco de síndrome da serotonina (hipertensão, hipertermia, mioclonia, alterações do estado mental).',
'O uso concomitante de carbamazepina e AMITRIPTILINA pode resultar em eficácia diminuída da amitriptilina.',
'O uso concomitante de amitriptilina e clonidina pode resultar em diminuição da eficácia anti-hipertensiva.',
'O uso concomitante de amitriptilina e azitromicina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de amoxicilina e varfarina pode resultar em um aumento do risco de hemorragi.',
'O uso concomitante de amoxicilina e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosíde.',
'O uso concomitante de ATENOLOL e ampicilina pode resultar em eficácia atenolol diminuiu.',
'O uso concomitante de ATENOLOL e ampicilina pode resultar em eficácia atenolol diminuiu.',
'O uso concomitante de ampicilina e varfarina pode resultar num risco aumentado de hemorragia.',
'O uso concomitante de ATENOLOL e ampicilina pode resultar em eficácia atenolol diminuiu.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosíde.',
'O uso concomitante de bloqueadores dos canais de cálcio dihidropiridínicos e bloqueadores beta-adrenérgicos pode resultar em hipotensão e / ou bradicardia.',
'O uso concomitante de bloqueadores dos canais de cálcio dihidropiridínicos e bloqueadores beta-adrenérgicos pode resultar em hipotensão e / ou bradicardia.',
'O uso concomitante de amlodipina e prednisolona pode resultar em redução da eficácia de amlodipina.',
'O uso concomitante de amlodipina e prednisona pode resultar em redução da eficácia de amlodipina.',
'O uso concomitante de carbamazepina e substratos selecionados do CYP3A4 pode resultar na diminuição da exposição dos substratos do CYP3A4.',
'O uso concomitante de amlodipina e  fortes ou moderados inibidores selecionados do CYP3A4 pode resultar em aumento da exposição amlodipina.',
'O que acontece: O uso concomitante de amlodipina e Sinvastatina pode resultar em aumento da exposição sinvastatina e risco aumentado de miopatia, incluindo rabdomiólise.',
'O uso concomitante de bloqueadores de cálcio canal e agentes anti-inflamatórios não esteróides pode resultar em um aumento do risco de hemorragia e / ou antagonismo do efeito hipotensor gastrointestinal.',
'O uso concomitante de amlodipina excelente e clopidogrel pode resultar em diminuição do efeito antiplaquetário e aumento do risco de eventos trombóticos.',
'O uso concomitante de amlodipina e cetoconazol pode resultar em concentrações séricas aumentadas de amlodipina e toxicidade (tonturas, hipotensão, rubor, dor de cabeça, edema periférico).',
'O uso concomitante de ATENOLOL e varfarina pode resultar em risco de aumento do tempo de protrombina ou do INR.',
' O uso concomitante de ATENOLOL e clonidina pode resultar em aumento do risco de bradicardia sinusal; resposta de retirada exagerada clonidina (hipertensão aguda).',
'O uso concomitante de bloqueadores dos canais de cálcio dihidropiridínicos e bloqueadores beta-adrenérgicos pode resultar em hipotensão e / ou bradicardia.',
'O uso concomitante de atracúrio e prednisona pode resultar em eficácia atracurium diminuiu; fraqueza muscular prolongada e miopatia.',
'O uso concomitante de sevoflurano e atracúrio pode resultar em ação aumentada de atracúrio.',
'O uso concomitante de atracúrio e prednisolona pode resultar em eficácia atracurium diminuiu; fraqueza muscular prolongada e miopatia.',
'O uso concomitante de antibióticos polipeptídeo e nondepolarizing NEUROMUSCULAR bloqueadores podem resultar em maior ou prolongado bloqueio neuromuscular.',
'O uso concomitante de carbamazepina e atracúrio pode resultar em diminuição da duração da ação do atracurium.',
'O uso concomitante de atracúrio e clindamicina pode resultar em maior e prolongado bloqueio neuromuscular.',
'O uso concomitante de aminoglicosídeos e nondepolarizing NEUROMUSCULAR bloqueadores podem resultar num aumento e / ou prolongado bloqueio neuromuscular que pode levar à depressão respiratória e paralisia.',
'O uso concomitante de atropina e potássio pode resultar em risco de lesões gastrointestinai.',
'O uso concomitante de morfina e anticolinérgicos pode resultar em aumento do risco de retenção urinária, constipação grave e íleo paralítico.',
'O uso concomitante de azitromicina e ONDANSETRONA pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de azitromicina e prometazina pode resultar em um aumento do risco de prolongamento do intervalo Q.',
'O uso concomitante de sevoflurano e QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de azitromicina e sinvastatina pode resultar em um aumento do risco de rabdomiólise.',
'O uso concomitante de azitromicina e varfarina pode resultar num risco aumentado de hemorragia.',
'O uso concomitante de morfina e SELECIONADO P-inibidores da glicoproteína pode resultar em aumento da exposição morfina.',
'O uso concomitante de azitromicina e ciprofloxacina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de carbamazepina e azitromicina pode resultar num aumento dos níveis de carbamazepina sérica.',
'O uso concomitante de azitromicina e cetoconazol pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante Feira de biperideno e potássio pode resultar em risco de lesões gastrointestinais.',
'O uso concomitante  de morfina e anticolinérgicos pode resultar em aumento do risco de retenção urinária, constipação severa, e íleo paralítico.',
'O uso concomitante de bupivacaína e propofol pode resultar em um aumento do efeito hipnótico de propofol.',
'Bom uso concomitante de potássio e captopril pode resultar em hipercalemia.',
'O uso simultânea de morfina e SELECIONADO P-inibidores da glicoproteína pode resultar em aumento da exposição morfina.',
'O uso concomitante de potássio e captopril pode resultar em hipercalemia.',
'O uso concomitante de diuréticos poupadores de potássio e enzima conversora de angiotensina inibidores podem resultar em hipercalemi.',
'O uso concomitante de trimetoprim e Interação DROGAS poupadores de potássio SELECIONADOS pode resultar em aumento do risco de hipercalemia.',
'O uso concomitante de carbamazepina e Inibidores da CYP3A4 pode resultar num aumento da exposição a carbamazepina.',
'O uso concomitante de carbamazepina e azitromicina pode resultar num aumento dos níveis de carbamazepina sérica.',
'O uso concomitante de carbamazepina e substratos selecionados do CYP3A4 pode resultar na diminuição da exposição dos substratos do CYP3A4.',
'O uso concomitante de carbamazepina e Ácido valpróico pode resultar em toxicidade carbamazepina (ataxia, nistagmo, diplopia, dor de cabeça, vômitos, apneia, convulsões, coma) e / ou diminuição da eficácia do ácido valpróico.',
'O uso concomitante de carbamazepina e cetoconazol pode resultar em aumento da exposição a carbamazepina e redução da exposição ao cetoconazol.',
'O uso concomitante de carbamazepina e clonazepam pode resultar em níveis plasmáticos reduzidos de clonazepam.',
'O uso concomitante de carbamazepina e NIMODIPINA pode resultar em redução das concentrações plasmáticas nimodipino e eficácia reduzida nimodipine.',
'O uso concomitante de carbamazepina e substratos do CYP3A4 seleccionada pode resultar na diminuição da exposição dos substratos do CYP3A4.',
'O uso concomitante de carbamazepina e substratos do CYP3A4 seleccionada pode resultar na diminuição da exposição dos substratos do CYP3A.',
'O uso concomitante de carbamazepina e fenitoína pode resultar em concentrações de fenitoína e / ou carbamazepina diminuíram.',
'O uso concomitante de carbamazepina e sinvastatina pode resultar na redução da exposição sinvastatina.',
'O uso concomitante de carvão activado e carbamazepina podem resultar na diminuição da exposição da carbamazepina.',
'O uso concomitante de carvedilol e clonidina pode resultar em aumento do risco de bradicardia sinusal; resposta de retirada exagerada clonidina (hipertensão aguda).',
'O uso concomitante de morfina e SELECIONADO P-inibidores da glicoproteína pode resultar em aumento da exposição morfina.',
'O uso concomitante da cefalexina e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de cefepime e varfarina pode resultar em um aumento do risco de hemorragi.',
'O uso concomitante de cetoconazol e produtos contendo alumínio, cálcio ou magnésio  pode resultar em diminuição da exposição cetoconazol.',
'O uso concomitante de CILOSTAZOL e  fortes e moderados inibidores selecionados do CYP3A4 e pode resultar em aumento da exposição cilostazol.',
'O uso concomitante de inibidores de CYP2C19 e CILOSTAZOL  e fortes ou moderados inibidores selecionados do CYP3A4 pode resultar em aumento da exposição cilostazol.',
'O uso concomitante do cilostazol e antiplaquetários seleccionada pode resultar em um aumento do risco de hemorragia.',
'A utilização concomitante de ciprofloxacina e cetoconazol pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de FLUOROQUINOLONAS selecionado e antidiabéticos SELECIONADOS pode resultar em alterações na glicemia e aumento do risco de hipoglicemia ou hiperglicemia.',
'O uso concomitante de metronidazol e SELECIONADOS DROGAS prolongar o intervalo QT (maior) pode resultar em aumento do risco de prolongamento do intervalo QT e arritmia.',
'O uso concomitante de ciprofloxacina e prometazina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de sevoflurano e QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de ciprofloxacina e sinvastatina podem resultar em um risco aumentado de miopatia ou rabdomiólise.',
'O uso concomitante de ciprofloxacina e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de clonazepam e cetoconazol pode resultar em aumento da exposição clonazepam.',
'O uso concomitante de analgésicos e OPIÓIDES BENZODIAZEPINAS podem resultar em depressão respiratória aditiva.',
'O uso concomitante de barbitúricos e benzodiazepínicos pode resultar em depressão respiratória aditiva.',
'O uso concomitante de barbitúricos e benzodiazepínicos pode resultar em depressão respiratória aditiva.',
'O uso concomitante de clonidina e METOPROLOL podem resultar em aumento do risco de bradicardia sinusal; resposta de retirada exagerada clonidina (hipertensão aguda.',
'O uso concomitante de clonidina e METOPROLOL pode resultar em aumento do risco de bradicardia sinusal; resposta de retirada exagerada clonidina (hipertensão aguda).',
'O uso concomitante de clopidogrel Feira e cetoconazol pode resultar em redução da eficácia clínica de clopidogrel.',
'O uso concomitante de clopidogrel e NIMODIPINA pode resultar em diminuição do efeito antiplaquetário e aumento do risco de eventos trombóticos.',
'O uso concomitante de anticoagulantes e antiagregantes plaquetários pode resultar em aumento do risco de hemorragia.',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de fluconazol e fenotiazinas pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de antipsicóticos e fenotiazinas pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de clorpromazina, adrenalina pode resultar em diminuição ou reversão de resposta epinefrina compressor.',
'O uso simultâneo da clorpromazina e fenobarbital pode resultar em eficácia clorpromazina diminuiu. O uso concomitante de fenitoína e fenotiazinas pode resultar em níveis phenothiazine aumentaram ou diminuíram os níveis de fenitoína e possivelmente reduzidos.',
'O uso concomitante de agentes antidiabéticos e fenotiazinas pode resultar em perda de controle glicêmico.',
'O uso simultâneo da clorpromazina e fluoxetina pode resultar em aumento da exposição fluoxetina e aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de clorpromazina, adrenalina pode resultar em diminuição ou reversão de resposta epinefrina compressor.',
'O uso concomitante de isoflurano e fenotiazinas pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de metoclopramida e antipsicóticos pode resultar em um risco aumentado de reações extrapiramidais ou síndrome maligna dos neurolépticos.',
'O uso concomitante de metronidazol e SELECIONADOS DROGAS prolongar o intervalo QT (maior) pode resultar em aumento do risco de prolongamento do intervalo QT e arritmias.',
'O uso concomitante de morfina e selecione CNS depressivos e anticolinérgicos AGENTES pode resultar em aumento do risco de íleo paralítico ; aumento do risco de depressão do SNC.',
'O uso concomitante de levofloxacina e fenotiazinas pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de agentes antidiabéticos e fenotiazinas pode resultar em perda de controle glicêmico.',
'O uso concomitante de metoprolol e Inibidores da CYP2D6 pode resultar num aumento da exposição do metoprolol.',
'O uso concomitante de metoprolol e Inibidores da CYP2D6 pode resultar num aumento da exposição do metoprolol.',
'O uso simultâneo da clorpromazina e norepinefrina pode resultar em eficácia noradrenalina diminuiu.',
'O uso simultâneo da clorpromazina e ONDANSETRONA pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de fluconazol e GLUCOCORTICÓIDES SELECIONADOS pode resultar em aumento da exposição de glicocorticóides e risco de toxicidade.',
'O uso concomitante de dexametasona e PHENOBARBITAL pode resultar em eficácia dexametasona diminuiu.',
'O uso concomitante de FLUOROQUINOLONAS SELECIONADOS SELECIONADOS e corticosteróides pode resultar em um aumento do risco de ruptura do tendão.',
'O uso concomitante de dexametasona e fenitoína pode resultar em eficácia dexametasona diminuiu.',
'O uso concomitante de dexametasona e NIMODIPINA pode resultar em redução das concentrações plasmáticas nimodipino e eficácia reduzida nimodipine.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangu.',
'O uso concomitante de morfina e SELECIONADO depressores do SNC pode resultar em aumento do risco de depressão do SN.',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de digoxina e diazepam pode resultar em toxicidade da digoxina ( náuseas, vômitos, arritmias cardíacas ).',
'O uso concomitante de flumazenil e benzodiazepinas pode resultar na precipitação de crises convulsivas.',
'O uso concomitante de barbitúricos e benzodiazepínicos pode resultar em depressão respiratória aditiva.',
'O uso concomitante de fluoxetina e DIAZEPAM pode resultar em maiores concentrações séricas de diazepam.',
'O uso concomitante de DIAZEPAM e fenitoína pode resultar em alterações nas concentrações séricas de fenitoína.',
'O uso concomitante de analgésicos e OPIÓIDES BENZODIAZEPINAS pode resultar em depressão respiratória aditiva.',
'O uso concomitante de omeprazol e DIAZEPAM pode resultar em efeitos diazepam maior e prolongado.',
'O uso concomitante de glicosidos digitálicos e diuréticos tiazídicos pode resultar em toxicidade digitalis ( náuseas, vómitos, arritmias ).',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de digoxina e adrenalina pode resultar em um risco aumentado de cardiotoxicidade (arritmias ).',
'O uso concomitante de digoxina e fluoxetina pode resultar em um aumento do risco de toxicidade por digoxina ( náuseas, vômitos, arritmias ).',
'O uso concomitante de furosemida e digoxina pode resultar em toxicidade digoxina ( náuseas, vômitos, arritmias cardíacas ).',
'O uso concomitante de digoxina e espironolactona pode resultar em aumento da exposição à digoxina.',

'O uso concomitante de beta-adrenérgicos bloqueadores e DIGITALIS GLICOSÍDEOS pode resultar em aumento do risco de bradicardia e possível toxicidade glicosídeo digitalis.',
'O uso concomitante de beta-adrenérgicos bloqueadores e DIGITALIS GLICOSÍDEOS pode resultar em aumento do risco de bradicardia e possível toxicidade glicosídeo digitalis.',
'O uso concomitante de digoxina e METOCLOPRAMIDA pode resultar em níveis de digoxina diminui.',
'O uso concomitante de digoxina e metformina pode resultar num aumento das concentrações plasmáticas de metformin.',
'O uso concomitante de digoxina e norepinefrina pode resultar em um risco aumentado de cardiotoxicidade (arritmias ).',
'O uso concomitante de dobutamina e LINEZOLIDA pode resultar em efeitos hipertensos aumentou.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicada.',
'O uso concomitante de dobutamina e METOPROLOL pode resultar em diminuição da eficácia dobutamina.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicada.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicad.',
'O uso concomitante de dopamina e fenitoína pode resultar em hipotensão e / ou paragem cardíaca.',
'O uso concomitante de digoxina e dopamina pode resultar em um risco aumentado de cardiotoxicidade (arritmias ).',
'O uso concomitante de dopamina e LINEZOLIDA pode resultar em efeitos hipertensos aumentou.',
'O uso concomitante de inibidores da ECA e agentes antidiabéticos pode resultar em aumento do risco de hipoglicemia.',
'O uso concomitante de diuréticos poupadores de potássio e enzima conversora de angiotensina inibidores podem resultar em hipercalemi.',
'O uso concomitante de ANGIOTENSINA CONVERTING ENZYME INIBIDORES DA e LOOP DIURÉTICOS pode resultar em hipotensão postural ( primeiro dose).',
'O uso concomitante de inibidores da ECA e AINEs pode resultar em disfunção renal ou diminuição da eficácia anti-hipertensiva.',
'O uso concomitante de inibidores da enzima de conversão da angiotensina e diuréticos tiazídicos pode resultar em hipotensão postural ( primeira dose).',
'O uso concomitante de inibidores da enzima de conversão da angiotensina e bloqueadores dos receptores da angiotensina II pode resultar em aumento do risco de eventos adversos ( ou seja , hipotensão , síncope, hipercaliémia , alterações na função renal , insuficiência renal aguda ).',
'O uso concomitante de fluoxetina e anticoagulantes podem resultar em um aumento do risco de hemorragia.',
'O uso concomitante de enoxaparina ea heparina pode resultar em aumento do risco de hemorragi.',
'O uso concomitante de inibidores da ECA e agentes antidiabéticos pode resultar em aumento do risco de hipoglicemi.',
'O uso concomitante de epinefrina e HALOPERIDOL pode resultar em diminuição ou reversão de resposta epinefrina compressor.',
'O uso concomitante de epinefrina e LINEZOLIDA pode resultar em efeitos hipertensos aumentou.',
'O uso concomitante de fluconazol e AINEs SELECIONADOS pode resultar em aumento da exposição NSAID e aumento do risco de toxicidade.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicada.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicada.',
'O uso concomitante de epinefrina e METOPROLOL pode resultar em hipertensão, bradicardi.',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de fenobarbital e fenitoína pode resultar em níveis de fenitoína aumentada ou diminuída.',
'O uso concomitante de formoterol e do intervalo QT DROGAS prolongando pode resultar em aumento do risco de arritmias ventriculares.',
'O uso simultâneo de Fentanyl e Inibidores da CYP3A4 pode resultar em aumento do risco de toxicidade fentani.',
'O uso simultâneo de Fentanyl e serotoninérgica AGENTES pode resultar em aumento do risco de síndrome da serotonina.',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso simultâneo de Fentanyl e depressores do SNC pode resultar em aumento do risco de depressão do SN.',
'O uso simultâneo de Fentanyl e fenobarbital pode resultar em concentrações plasmáticas de fentanil e aumento do risco de depressão do SNC.',
'O uso simultâneo de Fentanyl e indutores potentes do CYP3A4 pode resultar em concentrações plasmáticas de fentanil .',
'O uso concomitante de isoflurano e fluconazol pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de formoterol e do intervalo QT DROGAS prolongando pode resultar em aumento do risco de arritmias ventriculares.',
'O uso concomitante de fluconazol e HALOPERIDOL pode resultar em aumento da exposição haloperidol eo risco de prolongamento do intervalo QT.',
'O uso concomitante de fluconazol e substratos CYP2C19 SELECIONADAS ( major) pode resultar em concentrações plasmáticas aumentadas de substrato CYP2C19.',
'O uso concomitante de fluconazol e fenitoína pode resultar em um aumento do risco de toxicidade fenitoína ( ataxia, hiperreflexia , nistagmo, tremores ).',
'O uso concomitante de fluconazol e levofloxacina pode resultar em um aumento do risco de prolongamento do QTc e Torsades de pointes.',
'O uso concomitante de fluconazol e LOSARTAN pode resultar em diminuição da conversão de losartan no seu metabolito activo (E- 3174 ).',
'O uso concomitante de metronidazol e SELECIONADOS DROGAS prolongar o intervalo QT (maior) pode resultar em aumento do risco de prolongamento do intervalo QT e arritmias.',
'O uso concomitante de fluconazol e NIMODIPINA pode resultar em aumento dos níveis séricos nimodipine.',
'O uso concomitante de fluconazol e omeprazol pode resultar em concentrações plasmáticas aumentadas de omeprazol.',
'O uso concomitante de fluconazol e ONDANSETRONA pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso simultâneo de Fentanyl e serotoninérgica AGENTES pode resultar em aumento do risco de síndrome da serotonina.',
'O uso concomitante de fluoxetina e fluconazol pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de fluoxetina e do intervalo QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de fluoxetina e HALOPERIDOL pode resultar em aumento da exposição haloperidol e risco de toxicidade haloperidol ; aumento do risco de prolongamento do intervalo QT e torsades de pointes.',
'O uso concomitante de fluoxetina e anticoagulantes podem resultar em um aumento do risco de hemorragia.',
'O uso concomitante de agentes anti-inflamatórios não esteróides e Inibidores Seletivos da Recaptação pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de fluoxetina e insulinas ou pramlintide pode resultar em aumento do risco de hipoglicemi.',
'O uso concomitante de isoflurano e fluoxetina pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de fluoxetina e do intervalo QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de fluoxetina e LINEZOLIDA pode resultar em um aumento do risco de síndrome da serotonina (hipertensão , taquicardia, hipertermia, mioclonia , alterações do estado mental ).',
'O uso concomitante de fluoxetina e METOCLOPRAMIDA pode resultar em um risco aumentado de reações extrapiramidais ou síndrome maligna dos neurolépticos.',
'O uso concomitante de metronidazol e SELECIONADOS DROGAS prolongar o intervalo QT (maior) pode resultar em aumento do risco de prolongamento do intervalo QT e arritmias.',
'O uso concomitante de metoprolol e Inibidores da CYP2D6 pode resultar num aumento da exposição do metoprolol.',
'O uso concomitante de metoprolol e Inibidores da CYP2D6 pode resultar num aumento da exposição do metoprolol.',
'O uso concomitante de fluoxetina e ONDANSETRONA pode resultar em concentrações plasmáticas aumentadas de ondansetron e aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de furosemida e hidrocortisona pode resultar em hipocalemia.',
'O uso concomitante de agentes antidiabéticos e diuréticos pode resultar em aumento do risco de hiperglicemia ; aumentou as necessidades de insulina.',
'O uso concomitante de furosemida e fenitoína pode resultar em diminuição da eficácia furosemida.',
'O uso concomitante de furosemida e hidralazina pode resultar em uma resposta diurética aprimorado para furosemida.',
'O uso concomitante de diuréticos e agentes LOOP anti-inflamatórios não esteróides pode resultar em diminuição da eficácia anti-hipertensiva e diurética.',
'O uso concomitante de metformina e diuréticos pode resultar em piora do controle glicêmic.',
'O uso concomitante de morfina e diuréticos pode resultar em diminuição da eficácia dos diuréticos.',
'O uso concomitante de cálcio e digoxina pode resultar em um sério risco de arritmia e colapso cardiovascular.',
'O uso concomitante de ferro e alumínio , cálcio ou magnésio PRODUTOS CONTENDO pode resultar em diminuição da eficácia de ferro.',
'O uso concomitante de levofloxacina e alumínio , cálcio ou magnésio PRODUTOS CONTENDO pode resultar em diminuição da eficácia levofloxacina.',
'O uso concomitante de cálcio e hidroclorotiazida pode resultar em aumento do risco de hipercalcemi.',
'O uso concomitante de haloperidol e levofloxacina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de metoclopramida e antipsicóticos pode resultar em um risco aumentado de reações extrapiramidais ou síndrome maligna dos neurolépticos.',
'O uso concomitante de metronidazol e SELECIONADOS DROGAS prolongar o intervalo QT (maior) pode resultar em aumento do risco de prolongamento do intervalo QT e arritmias.',
'O uso concomitante de morfina e SELECIONADO depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de metoprolol e Inibidores da CYP2D6 pode resultar num aumento da exposição do metoprolol.',
'O uso concomitante de haloperidol e ONDANSETRONA pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de heparina e agentes anti-inflamatórios não esteróides pode resultar em aumento do risco de hemorragia gastrointestina.',
'O uso concomitante de heparina e NITROGLICERINA pode resultar numa diminuição do tempo de tromboplastina parcial.',
'O uso concomitante de agentes anti-inflamatórios não esteróides e diuréticos tiazídicos pode resultar em diminuição da eficácia anti-hipertensiva e diurética.',
'O uso concomitante de agentes antidiabéticos e diuréticos pode resultar em aumento do risco de hiperglicemia ; aumentou as necessidades de insulina.',
'O uso concomitante de hidroclorotiazida e hidrocortisona pode resultar em hipocalemia e arritmias cardíacas subsequente.',
'O uso concomitante de metformina e diuréticos pode resultar em piora do controle glicêmic.',
'O uso concomitante de morfina e diuréticos pode resultar em diminuição da eficácia dos diuréticos.',
'O uso concomitante de hidroclorotiazida e metilprednisolona pode resultar em hipocalemia e arritmias cardíacas subseqüentes.',
'O uso concomitante de hidrocortisona e PHENOBARBITAL pode resultar em diminuição da eficácia do corticosteroide.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de FLUOROQUINOLONAS SELECIONADOS SELECIONADOS e corticosteróides pode resultar em um aumento do risco de ruptura do tendão.',
'O uso concomitante de hidrocortisona e fenitoína pode resultar em eficácia hidrocortisona diminuiu.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de hidrocortisona e neostigmina pode resultar em diminuição da eficácia da neostigmina.',
'O uso concomitante de antiácidos e clorpromazina pode resultar em eficácia phenothiazine diminuiu.',
'O uso concomitante de fenitoína e os antiácidos podem resultar numa diminuição da exposição da fenitoína.',
'O uso concomitante de digoxina e os antiácidos podem resultar em níveis de digoxina diminuiu.',
'O uso concomitante de levofloxacina e alumínio , cálcio ou magnésio PRODUTOS CONTENDO pode resultar em diminuição da eficácia levofloxacin.',
'O uso concomitante de ferro e alumínio, cálcio ou magnésio PRODUTOS CONTENDO pode resultar em diminuição da eficácia de ferro.',
'O uso concomitante de levofloxacina e agentes anti-inflamatórios não esteróides pode resultar em um aumento do risco de convulsõe.',
'O uso concomitante de receptores da angiotensina II bloqueadores e agentes anti-inflamatórios não esteróides pode resultar em efeitos anti-hipertensivos diminuíram e um risco aumentado de insuficiência rena.',
'O uso concomitante de ibuprofeno e fenitoína pode resultar em um aumento do risco de toxicidade fenitoína ( ataxia, hiperreflexia , nistagmo, tremor) , especialmente em pacientes com insuficiência rena.',
'O uso concomitante de agentes anti-inflamatórios não esteróides e diuréticos pode resultar na redução da eficácia diurético, hipercalemia , ou possível nephrotoxicity poupadores de potássio.',
'O uso concomitante de bloqueadores beta-adrenérgicos e agentes anti-inflamatórios não esteróides pode resultar em diminuição do efeito anti-hipertensivo.',
'O uso concomitante de bloqueadores de cálcio canal e agentes anti-inflamatórios não esteróides pode resultar em um aumento do risco de hemorragia e / ou antagonismo do efeito hipotensor gastrointestinal.',
'O uso concomitante de agentes antidiabéticos e inibidores da monoamina oxidase pode resultar em aumento do risco de hipoglicemi.',
'O uso concomitante de bloqueadores do receptor de angiotensina ea insulina pode resultar em aumento do risco de hipoglicemia.',
'O uso concomitante de agentes antidiabéticos e diuréticos pode resultar em aumento do risco de hiperglicemia ; aumentou as necessidades de insulina.',
'O uso concomitante de insulina e pramlintide e antidiabéticos orais pode resultar em aumento do risco de hipoglicemia.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de agentes antidiabéticos e bloqueadores beta-adrenérgicos pode resultar em hipoglicemia ou hiperglicemia ; diminuição de sintomas de hipoglicemia.',
'O uso concomitante de agentes antidiabéticos e agentes simpaticomiméticos SELECIONADOS pode resultar em regulação da glicose prejudicada.',
'O uso concomitante de insulina e pramlintide e antidiabéticos orais pode resultar em aumento do risco de hipoglicemia.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de FLUOROQUINOLONAS selecionado e antidiabéticos SELECIONADOS pode resultar em alterações na glicemia e aumento do risco de hipoglicemia ou hiperglicemi.',
'O uso concomitante de bloqueadores do receptor de angiotensina ea insulina pode resultar em aumento do risco de hipoglicemia.',
'O uso concomitante de morfina e anticolinérgicos pode resultar em aumento do risco de retenção urinária , constipação grave e íleo paralítico.',
'O que acontece: O uso concomitante de morfina e SELECIONADO depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de isoflurano e ONDANSETRONA pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes , parada cardíaca ).',
'O uso concomitante de FLUOROQUINOLONAS selecionado e antidiabéticos SELECIONADOS pode resultar em alterações na glicemia e aumento do risco de hipoglicemia ou hiperglicemi.',
'O uso concomitante de lidocaína e fenitoína pode resultar em efeitos aditivos depressivos cardíacos ; diminuição das concentrações séricas de lidocaína.',
'O uso concomitante de lidocaína e METOPROLOL pode resultar em toxicidade da lidocaína (ansiedade, depressão miocárdica, parada cardíaca).',
'O uso concomitante de LINEZOLIDA e METOCLOPRAMIDA pode resultar em aumento do risco de síndrome da serotonina (hipertermia, hiperreflexia, mioclonia, alterações do estado mental).',
'O uso concomitante de LINEZOLIDA e fenobarbital pode resultar em concentrações séricas linezolide diminuiu.',
'O uso concomitante de LINEZOLIDA e fenitoína pode resultar em concentrações séricas linezolide diminuiu.',
'O uso concomitante de agentes antidiabéticos e inibidores da monoamina oxidase pode resultar em aumento do risco de hipoglicemi.',
'O uso concomitante de receptores da angiotensina II bloqueadores e diuréticos poupadores de potássio pode resultar em hipercalemia.',
'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de agentes antidiabéticos e bloqueadores beta-adrenérgicos pode resultar em hipoglicemia ou hiperglicemia ; diminuição de sintomas de hipoglicemia .',
'O uso concomitante de metformina e morfina pode resultar num aumento das concentrações plasmáticas de metformina.',

'O uso concomitante de agentes antidiabéticos e glicocorticóides podem resultar num aumento dos níveis de glicose no sangue.',
'O uso concomitante de agentes antidiabéticos e bloqueadores beta-adrenérgicos pode resultar em hipoglicemia ou hiperglicemia; diminuição de sintomas de hipoglicemia.',
'O uso concomitante de analgésicos e OPIÓIDES BENZODIAZEPINAS pode resultar em depressão respiratória aditiva.',
'O uso concomitante de morfina e selecione antagonistas opióides pode resultar em diminuição da eficácia de opióides e precipitação de abstinência de opióides.',
'O uso concomitante de morfina e SELECIONADO depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de morfina e SELECIONADO depressores do SNC pode resultar em aumento do risco de depressão do SNC.',
'O uso concomitante de morfina e selecione CNS depressivos e anticolinérgicos AGENTES pode resultar em aumento do risco de íleo paralítico; aumento do risco de depressão do SNC.',
'O uso concomitante de neostigmina e prednisolona pode resultar em diminuição da eficácia da neostigmina.',
'O uso concomitante de neostigmina e prednisona pode resultar em diminuição da eficácia da neostigmina.',
'O uso concomitante de NIMODIPINA e prednisona pode resultar em redução das concentrações plasmáticas nimodipino e falta de eficácia nimodipine.',
'O uso concomitante de nitroglicerina e pancurônio pode resultar em um aumento na duração de ação do pancurônio.',
'O uso concomitante de varfarina e omeprazol pode resultar em elevações dos valores séricos relação normalizada internacional e potenciação dos efeitos anticoagulantes.',
'O uso concomitante de sevoflurano e QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de ONDANSETRONA e TRAMADOL pode resultar em redução da eficácia de tramadol.',
'O uso concomitante de ondansetrom e do intervalo QT DROGAS prolongando pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de ONDANSETRONA e prometazina pode resultar em um aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de oxacilina e varfarina pode resultar na diminuição da INR / tempo de protrombina e eficácia anticoagulante.',
'O uso concomitante de sevoflurano e pancurônio pode resultar em ação aprimorada de pancurônio.',
'O uso concomitante de antibióticos polipeptídeo e nondepolarizing NEUROMUSCULAR bloqueadores podem resultar em maior ou prolongado bloqueio neuromuscular.',
'O uso concomitante de pancurônio e prednisolona pode resultar em eficácia pancurônio diminuiu; fraqueza muscular prolongada e miopatia.',
'O uso concomitante de aminoglicosídeos e nondepolarizing NEUROMUSCULAR bloqueadores podem resultar num aumento e / ou prolongado bloqueio neuromuscular que pode levar à depressão respiratória e paralisia.',
'O uso concomitante de pancurônio e prednisona pode resultar em eficácia pancurônio diminuiu; fraqueza muscular prolongada e miopatia.',
'O uso concomitante de PIPERACILINA e varfarina pode resultar em um aumento do risco de hemorragi.',
'O uso concomitante de aminoglicosídeos e penicilinas pode resultar em perda de eficácia aminoglicosídeo.',
'O uso concomitante de prednisolona e varfarina pode resultar em aumento do risco de hemorragia ou efeitos diminuídos de varfarin.',
'O uso concomitante de prednisona e varfarina pode resultar em aumento do risco de hemorragia ou efeitos diminuídos de varfarina.',
'O uso concomitante de sevoflurano e QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de prometazina e TRAMADOL pode resultar em um aumento do risco de convulsõe.',
'O uso concomitante de ranitidina e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de ranitidina e risperidona pode resultar em aumento da biodisponibilidade da risperidon.',
'O uso concomitante de sevoflurano e QT DROGAS prolongando pode resultar em aumento do risco de prolongamento do intervalo QT.',
'O uso concomitante de risperidona e sinvastatina pode resultar em aumento das concentrações séricas de sinvastatina com um risco aumentado de miopatia ou rabdomiólise.',
'O uso concomitante de cotrimoxazole e antipsicóticos pode resultar em um aumento do risco de cardiotoxicidade (prolongamento QT, torsades de pointes, parada cardíaca).',
'O uso concomitante de risperidona e TRAMADOL pode resultar em um aumento do risco de convulsões.',
'O uso concomitante de anticoagulantes e fibrinolíticos SELECIONADOS SELECIONADOS pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de rivaroxabana e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de sinvastatina e varfarina pode resultar em aumento do risco de hemorragia e um aumento do risco de rabdomiólis.',
'O uso concomitante de sulfametoxazol e varfarina pode resultar em aumento da exposição varfarina.',
'O uso concomitante de magnésio e TOBRAMICINA pode resultar em fraqueza neuromuscular.',
'O uso concomitante de anticoagulantes e fibrinolíticos SELECIONADOS SELECIONADOS pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de TOBRAMICINA e VANCOMICINA  pode resultar em ototoxicity e / ou nefrotoxicidade aditiv.',
'O uso concomitante de vancomicina e varfarina pode resultar em um aumento do risco de hemorragia.',
'O uso concomitante de tramadol e varfarina pode resultar em um aumento no tempo de protrombina e um risco aumentado de hemorragia.');

    export default{

        props: ['data', 'medico'],

        data(){
            return {
                
                paciente: '',
                numeroprontuario: '',
                clinica: '',   
                leito: '',
                diag: '',
                diagInfe: '',
                admissao: '',
                prontuario: '',
                qtd:'',
                nome:'',
                posologia:'',
                obs:'',
                iniTrata:'',
                medInfe:'',
                duracao:'',
                prescricao: {
                    idinternacao: '',
                    dataprescricao: '',
                    historicoatual: '',
                    evolucao: '',
                    dataprescricao: '',
                    observacoesmedicas: '',
                    prescricaomedicamento: [],
                    relatorioAntimicro: [],
                },
            }
        },
        mounted(){
            this.prescricao.dataprescricao = this.data;
        },
        methods: {
            addMed(){
                    var cod = $("#codigo").val();
                    var aux = new Array();
                    var aux_pai = new Array();
                    var posicao = new Array();
                    var posicao2 = new Array();

                    array.push(cod);
                    var i;
                    var j;

                    for (i = 0; i < sub1.length ; i++){
                        if(cod == sub1[i]){
                            aux.push(sub2[i]);
                            posicao.push(i);
                        }
                    }

                    for (i = 0; i < sub2.length ; i++){
                        if(cod == sub2[i]){
                            aux_pai.push(sub1[i]);
                            posicao2.push(i);
                        }
                    } 

                    for (i = 0; i < aux.length ; i++) {
                        //alert(aux[i]);
                        for (j = 0; j < array.length ; j++){
                            if(aux[i] == array[j]){
                                let pos = posicao[i];
                            alert(consequencia[pos]);
                            }    
                        }
                    }

                    for (i = 0; i < aux_pai.length ; i++) {
                        //alert(aux[i]);
                        for (j = 0; j < array.length ; j++){
                            if(aux_pai[i] == array[j]){
                                let pos = posicao2[i];
                                swal({
                                    title: "Interação Medicamentosa",
                                    text: consequencia[pos], 
                                    type: "warning",
                                    html: true,
                                });
                            }    
                        }
                    } 


                if(typeof  this.prescricao.prescricaomedicamento[0] != "undefined"){
                    //alert(this.prescricao.prescricaomedicamento[0].diluicao);
                }                    

                var id = $("#idmed").val()
                this.$http.post('../simpas', {id: id}).then(response => {
                    var codigo = $("#codigo").val();
                    var med = $("#med").val();
                    var dose = $("#dose").val();
                    var administracao = $("#administracao").val();
                    var estabilidade = $("#estabilidade").val();
                    var diluicao = $("#diluicao").val();
                
                    alert(classific);

                    this.prescricao.relatorioAntimicro.push({
                        idmedicamento: id,
                        medInfe: med,
                        duracao: this.duracao,
                        leito: this.leito,
                        paciente: this.paciente,
                        dataadmissao: this.admissao,
                        iniTrata: this.iniTrata,
                        clinica: this.clinica,
                        diagInfe: this.diagInfe
                    });

                    this.prescricao.prescricaomedicamento.push({
                        codigo: codigo,
                        simpas: response.data,
                        idmedicamento: id,
                        qtd: this.qtd,
                        med: med,
                        obs: this.obs,
                        posologia: this.posologia,
                        administracao: administracao,
                        dose: dose,
                        diluicao: diluicao,
                        estabilidade: estabilidade,
                        classificacao: classific
                    });

                    //this.qtd = '';
                    this.simpas = '-';
                    this.obs = '';
                    $("#med").val("");
                    //$('.qtd').css('display','none');
                    $('.med').removeClass("col-xs-11 col-sm-11 col-md-11");
                    $('.med').addClass("col-xs-12 col-sm-12 col-md-12");
                }).catch(response => {
                     console.log('erro');
                });
            },
            removeMed(med) {
                var index = this.prescricao.prescricaomedicamento.indexOf(med)
                if(index > -1){
                    this.prescricao.prescricaomedicamento.splice(index, 1)                  
                }
            },
            adicionar(){
                this.$http.post('/prescricao/create', this.prescricao).then(response => {
                    swal({
                        title: "Salvo!",
                        text: "Prescrição cadastrada com sucesso!",
                        confirmButtonColor: "#66BB6A",
                        type: "success",
                        showLoaderOnConfirm: true
                   },
                   function(){
                       // location.href = "../../prescricao";
                   }); 
                }).catch(response => {
                    console.log('Erro:' + response);
                });
            },
            buscarnome(){
                var nome = $("#nome").val();
                this.$http.post('../buscapaciente', {nome: nome}).then(response => {
                   
                    $("#buscar").modal('hide')
                    this.paciente = response.data[0].nomecompleto;  
                    this.clinica = response.data[0].nome;
                    this.numeroprontuario = response.data[0].numeroprontuario;
                    this.leito = response.data[0].leito;
                    this.diag = response.data[0].descricao;
                    this.admissao = response.data[0].dataadmissao;
                    this.prescricao.idinternacao = response.data[0].id; 
          
                }).catch(response => {
                   console.log(response);
                     $("#buscar").modal('hide')
                    swal({
                        title: "Erro!",
                        text: "Não existe esse registro na base de dados",
                        type: "error"
                   });
                });
            },

            buscarprontuario(){
                var prontuario = $("#prontuario").val();
                this.$http.post('../buscapaciente', {prontuario: prontuario}).then(response => {
                   
                    $("#buscar").modal('hide')
                    this.paciente = response.data[0].nomecompleto;  
                    this.clinica = response.data[0].nome;
                    this.numeroprontuario = response.data[0].numeroprontuario;
                    this.leito = response.data[0].leito;
                    this.diag = response.data[0].descricao;
                    this.admissao = response.data[0].dataadmissao;
                    this.prescricao.idinternacao = response.data[0].id; 
          
                }).catch(response => {
                   console.log(response);
                     $("#buscar").modal('hide')
                    swal({
                        title: "Erro!",
                        text: "Não existe esse registro na base de dados",
                        type: "error"
                   });
                });
            }

        }
    }
    jQuery(function ($) {
        $("#rg").mask("99.999.999-99");
    });
    
    $(document).ready(function(){
        var a;
        $('#med').autocomplete({
            source: '/autocomplete',
            minlength: 1,
            autoFocus:true,
            select: function(event, ui){
                $("#codigo").val(ui.item.codigo);
                $("#med").val(ui.item.id);
                $("#dose").val(ui.item.dose);
                $("#diluicao").val(ui.item.diluicao);
                $("#administracao").val(ui.item.administracao);
                $("#estabilidade").val(ui.item.estabilidade);
                
                a = ui.item.value;

                if(ui.item.classificacao == 2){
                    classific = ui.item.classificacao;
                    $(document).ready(function() {
                        $("#relatorio").modal('show');
                        $("#medInfe").val(ui.item.value); // pega o nome do medicamento
                    });
                }else{
                    classific = 7;
                }


                $("#idmed").val(ui.item.id);
                $('.qtd').css('display','block');
                $('.med').removeClass("col-xs-12 col-sm-12 col-md-12");
                $('.med').addClass("col-xs-11 col-sm-11 col-md-11");

                $.ajax({
                    type: 'get',
                    url: '../medicamento/contraindicacao',
                    data: {
                        'id': ui.item.id,
                    },
                    success: function (data){
                        swal({
                            title: "Contraindicação",
                            text: data, 
                            type: "warning",
                            html: true,
                        });
                    },
                });
            },
            change: function(event, ui){
           //  alert(ui);          
                var b = $("#med").val();
                if(a != Trim(b)){
                    $("#idmed").val(null);
                    $('.qtd').css('display','none');
                    $('.med').removeClass("col-xs-11 col-sm-11 col-md-11");
                    $('.med').addClass("col-xs-12 col-sm-12 col-md-12");
                }
            }
        });
    });

    function Trim(str){
        return str.replace(/^\s+|\s+$/g,"");
    }

    $(document).on('click', '.buscar', function (){
        $("#buscar").modal('show');
    });

    $(document).on('click', '.relatorio', function (){
        $("#relatorio").modal('show');
    });

</script>

<template>
    <div>
        <div class="row">         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="box-body pad table-responsive">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left"><small><strong>Médico: </strong>{{this.medico}}</small></div> 
                        <div class="pull-right"><small><strong>Data da prescrição: </strong>{{this.data}}</small></div>
                        <br><br>
                    </div>
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group">
                            <label for="paciente">Paciente:</label>
                            <div class="input-group input-group-sm">
                                <input id="paciente" type="text" name="paciente" class="form-control" readonly="readonly" v-model="paciente">
                                
                                <span class="input-group-btn">
                                  <button type="button" data-toggle="tooltip" title="Buscar paciente internado" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="numeroprontuario">Nº Prontuário:</label>
                            <input id="numeroprontuario" type="text" name="numeroprontuario" class="form-control" readonly="readonly" v-model="numeroprontuario">
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <label for="clinica">Clínica:</label>
                            <input id="clinica" type="text" name="clinica" class="form-control" readonly="readonly" v-model="clinica">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="leito">Leito:</label>
                            <input id="leito" type="text" name="leito" class="form-control" readonly="readonly" v-model="leito">
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="diag">Diagnóstico:</label>
                            <input id="diag" type="text" name="diag" class="form-control" readonly="readonly" v-model="diag">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="admissao">Data de admissão:</label>
                            <input id="admissao" type="text" name="admissao" class="form-control" readonly="readonly" v-model="admissao">
                        </div>
                    </div>
                    

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="evol">Evolução:</label>
                            <textarea id="evol" type="text" name="evol" class="form-control" v-model="prescricao.evolucao"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="med">Medicamento/Outros:</label>
                            <input id="med" type="text" name="med" class="form-control" placeholder="Pesquise pela substância ativa..." >
                        </div>
                    </div>


                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="dose">Dose:</label>
                            <textarea id="dose" type="text" name="dose" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    
                    <input id="idmed" type="hidden">
                    <input id="codigo" type="hidden">
                    
                    <div class="col-xs-1 col-sm-1 col-md-1" >
                        <div class="form-group">
                            <label for="qtd">Quantidade:</label>
                            <input id="qtd" type="text" name="qtd" class="form-control" v-model="qtd">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="administracao">Administração:</label>
                            <input id="administracao" type="text" name="administracao" class="form-control">
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="diluicao">Diluição:</label>
                            <input id="diluicao" type="text" name="diluicao" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="estabilidade">Estabilidade:</label>
                            <input id="estabilidade" type="text" name="estabilidade" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 obs">
                        <div class="form-group">
                            <label for="posologia">Posologia:</label>
                            <input id="posologia" type="text" name="posologia" class="form-control" v-model="posologia" placeholder="">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 obs">
                        <div class="form-group">
                            <label for="obs">Observações:</label>
                            <input id="obs" type="text" name="obs" class="form-control" v-model="obs" placeholder="Administrar por via oral a cada 12 horas, durante 7 dias...">
                        </div>
                    </div>

                    <div class="row" style="margin-left: 65%;">
                        <div class="col-sm-12 text-center"> 
                            <button data-toggle="tooltip" style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block relatorio">Relatório Antibioticoterapia</button>
                            <button style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block" @click="addMed">Adicionar</button>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <br>
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <h4><center><b>Descrição da prescrição</b></center></h4>
                                <div class="box-body">
                                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                                        <table id="table" class="table table-condensed table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">codigo</th>
                                                    <th class="text-center">SIMPAS</th>
                                                    <th width="2%" class="text-center">Quantidade</th>
                                                    <th class="text-center">Medicamento</th>
                                                    <th class="text-center">Posologia</th>
                                                    <th class="text-center">Observação</th>
                                                    <th class="text-center">Dose</th>
                                                    <th class="text-center">Administração</th>
                                                    <th class="text-center">Diluição</th>
                                                    <th class="text-center">Estabilidade</th>

                                                    <th width="3%" class="text-center">Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="medicamento in prescricao.prescricaomedicamento">
                                                    <td>{{medicamento.codigo}}</td>
                                                    <td>{{medicamento.simpas}}</td>
                                                    <td>{{medicamento.qtd}}</td>
                                                    <td>{{medicamento.med}}</td>
                                                    <td>{{medicamento.posologia}}</td>
                                                    <td>{{medicamento.obs}}</td>
                                                    <td>{{medicamento.dose}}</td>
                                                    <td>{{medicamento.administracao}}</td>
                                                    <td>{{medicamento.diluicao}}</td>
                                                    <td>{{medicamento.estabilidade}}</td>
                                                    <td>             
                                                        <center>
                                                        <a class="btn btn-default"  @click="removeMed(medicamento)"><i class="fa fa-trash"></i></a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="obsmed">Observações médicas:</label>
                            <textarea id="obsmed" type="text" name="obsmed" class="form-control" rows="5" v-model="prescricao.observacoesmedicas"></textarea>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-right: 1%;">
                        <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Salvar" @click="adicionar"><i class="fa fa-save"></i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="buscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Buscar paciente</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="form-group">
                                            <label for="paciente">Nome:</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="nome" id="nome" class="form-control" v-model="nome">
                                                
                                                <span class="input-group-btn">
                                                  <button type="submit" class="btn btn-primary" @click="buscarnome" data-toggle="tooltip" title="Digite o nome do paciente" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="form-group">
                                            <label for="paciente">Prontuário:</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="prontuario" id="prontuario" class="form-control" v-model="prontuario">
                                                
                                                <span class="input-group-btn">
                                                  <button type="submit" class="btn btn-primary" @click="buscarprontuario" data-toggle="tooltip" title="Digite o prontuário do paciente" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="relatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Relatório</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">

                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="paciente">NOME:</label>
                                        <input id="posologia" v-model="paciente" type="text" name="posologia" class="form-control"  readonly="">
                                     </div>
                                 </div>

                                 <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label for="leito">LEITO:</label>
                                        <input id="leito" type="text" name="leito" class="form-control" readonly="readonly" v-model="leito">
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="admissao">DATA DE ADMISSÃO:</label>
                                        <input id="admissao" type="text" name="admissao" class="form-control" readonly="readonly" v-model="admissao">
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="iniTrata">INÍCIO DO TRATAMENTO:</label>
                                        <input id="iniTrata" type="date" name="iniTrata" class="form-control" v-model="iniTrata">
                                    </div>
                                </div>

                                <div class="col-xs-5 col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <label for="clinica">CLÍNICA:</label>
                                        <input id="clinica" type="text" name="clinica" class="form-control" readonly="readonly" v-model="clinica">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="diagInfe">DIAGNÓSTICO INFECCIOSO:</label>
                                        <input id="diagInfe" type="text" name="diagInfe" class="form-control" v-model="diagInfe">
                                     </div>
                                 </div>

                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="duracao">DURAÇÃO DO TRATAMENTO:</label>
                                        <input id="duracao" type="text" name="duracao" class="form-control" v-model="duracao">
                                     </div>
                                 </div>

                                 <div class="col-xs-12 col-sm-12 col-md-12 med">
                                    <div class="form-group">
                                        <label for="medInfe">IDENTIFICAÇÃO DO ANTIMICROBIANO:</label>
                                        <input id="medInfe" type="text" name="medInfe" class="form-control" readonly="" >
                                    </div>
                                </div>

                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>




    </div>
</template>

<style scoped=""></style>
