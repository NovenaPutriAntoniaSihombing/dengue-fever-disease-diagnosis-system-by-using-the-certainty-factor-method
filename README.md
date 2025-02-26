# dengue-fever-disease-diagnosis-system-by-using-the-certainty-factor-method
# DENGUE FEVER DIAGNOSIS PROGRAM DESCRIPTION
This program is a Certainty Factor (CF)-based system  designed to help diagnose the possibility of Dengue Fever (DHF) based on the symptoms experienced by the user. Users can provide a level of confidence in the symptoms they experience in the form of CF (Confidence Factor) values. The system then calculates the possible diagnosis based on a combination of the CF values provided by the user and the knowledge of medical experts that have been integrated in the system.
# Expert and User Knowledge Base
## Expert Knowledge Base: 
An expert knowledge base is a CF score given based on an expert's experience or medical knowledge of how likely it is that a particular symptom indicates the presence of Dengue Fever. This CF value is usually higher for the very typical symptoms of Dengue Fever and lower for more common symptoms or can apply to other diseases. Here are some of the symptoms that are references:

    Symptom             CF Expert
    Pain all over the body  1.0
    Joint pain              0.8
    Muscle pain             0.6
    Abdominal pain          0.4
    Fever                   1.0
    Red spots on the skin   0.6
    Headache                0.7
    Nauseous                0.5
    Vomit                   0.5
    Reduced appetite        0.1
    Fast and weak pulse     0.7
    The body feels cold     0.2
    Decreased consciousness	0.3
    Bleeding gums           1.0

  -	CF Expert 1.0 means that the symptoms are very strong indicating the presence of Dengue Fever.
-	Expert CF 0.8 - 0.6 shows symptoms that are quite supportive but uncertain.
-	Expert CF 0.5 - 0.4 is a symptom that can generally be found in a variety of diseases, including Dengue Fever.
-	 Expert CF of 0.1 to 0.3 shows less frequent or unrelated symptoms of Dengue Fever.

## User Knowledge Base: 
A user knowledge base is the input provided by users through forms. Users were asked to give an assessment of their level of confidence (CF score) towards the symptoms they experienced. The CF value given by these users is subjective and can vary depending on the individual's perception and experience.

    It	Information	       User Value
    1	     Not	            0 – 0.1
    2	  Do not know	        0.2 -0.3
    3	 A Little Confident	  0.4 – 0.5
    4	   Pretty Sure	      0.6 – 0.7
    5	    Believe	          0.8 – 0.9
    6	 Highly Confident	        1

Then it was continued with the determination of the user's weight value. Suppose the user chooses the following answer:
- Pain all over the body = Little Sure = 0.4
- Joint pain= no = 0.1
- Muscle pain= No = 0.1
- Abdominal pain= Don't know = 0.2
- Fever = Fairly Sure = 0.6
- Red spots on the skin = Little Sure = 0.4
- Headache = little confidence = 1
- Nausea = No = 0.2
- Vomiting = No = 0.1
- Reduced appetite=Little confidence= 0.5
- Fast and weak pulse rate =Slightly confident =0.4
- Body feeling cold = No = 0.7
- Decreased consciousness = Little confidence = 0.3
- Bleeding gums = Don't know = 0
  
After making calculations, it can be concluded that the calculation of the certainty factor method in the diagnosis of dengue fever was obtained as a percentage of confidence level, which was 98.01% that the user was experiencing dengue fever.
# DIAGNOSTIC PROCESS
## 1.	User Input:
 Users fill out a form with a CF value for each symptom they experience. This CF value will be combined with the CF given by the expert to calculate the level of confidence that the user has Dengue Fever.
## 2.	CF Calculation:
- For each symptom, the system calculates the CF Symptom by multiplying the expert CF value and the CF value entered by the user.
- Then, the system combines all the CF Symptoms to calculate the Combination CF using the fuzzy combination formula, which takes into account the previous CF results with the next symptoms.
## 3.	Diagnostic Results: 
After calculating all the Combined CF values for each symptom, the system calculates the combined total CF and generates a percentage of confidence that the user has Dengue Fever.
- The Final CF obtained is then converted into a percentage of confidence.
- These results can give users an idea of how likely they are to have Dengue Fever based on the symptoms they are experiencing.

# CONCLUSION
This program uses  the Certainty Factor (CF)  method to help diagnose the possibility of Dengue Fever (DHF) based on the symptoms felt by the user. With the CF approach, the system can handle uncertainty in the information provided by the user through a level of confidence in each symptom. The diagnosis results are calculated based on a combination of CF values provided by the user and references to medical knowledge that has been entered into the system. This method allows the diagnosis results to be more accurate and in accordance with real conditions based on input from users and experts.


