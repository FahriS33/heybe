from chatterbot import ChatBot


chatbot = ChatBot(
    'Heybe Chatbot',
    storage_adapter='chatterbot.storage.SQLStorageAdapter',
    logic_adapters=[
        'chatterbot.logic.MathematicalEvaluation',
        'chatterbot.logic.TimeLogicAdapter',
        'chatterbot.logic.BestMatch',
        {
            'import_path': 'chatterbot.logic.BestMatch',
            'default_response': 'Uzgunum Seni Anlayamadim!.',
            'maximum_similarity_threshold': 0.90
        }
    ],
    database_uri='sqlite:///database.sqlite3'
)

 
from chatterbot.trainers import ListTrainer

trainer = ListTrainer(chatbot)

training_data_quesans = open('training_data/ques_ans.txt').read().splitlines()
training_data_personal = open('training_data/personal_ques.txt').read().splitlines()

training_data = training_data_quesans + training_data_personal

trainer.train(training_data)


from chatterbot.trainers import ChatterBotCorpusTrainer

trainer_corpus = ChatterBotCorpusTrainer(chatbot)

trainer_corpus.train(
    'chatterbot.corpus.english'
)
