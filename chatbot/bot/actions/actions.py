from typing import Any, Text, Dict, List

from rasa_sdk import Action, Tracker
from rasa_sdk.executor import CollectingDispatcher
import mysql.connector


class action_get_infor(Action):

    def name(self) -> Text:
        return "action_get_infor"

    def run(self, dispatcher: CollectingDispatcher,
            tracker: Tracker,
            domain: Dict[Text, Any]) -> List[Dict[Text, Any]]:

        sj = next(tracker.get_latest_entity_values("subject"), None)
        mydb = mysql.connector.connect(host="127.0.0.1", user="root", passwd ="", database="nln_mt")
        mycursor = mydb.cursor()
        query = "SELECT * FROM ctdt WHERE Name LIKE '" + sj + "'"
        mycursor.execute(query)

        myresult = mycursor.fetchall()

        if len(myresult) > 0:
            dispatcher.utter_message(text="Đây là thông tin về chương trình đào tạo của ngành " + sj + ": http://localhost/NLN_MT/assets/uploads/" + myresult[0][2])
        else:
            dispatcher.utter_message(text="Xin lỗi! Ngành bạn muốn hỏi hiện không có trên hệ thống.")
        return []
