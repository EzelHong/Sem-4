Public Class ScoringForm

    Private random As New Random()
    Private operation As String
    Private score As Integer = 0
    Private questionCount As Integer = 0

    Private Sub btnEasy_Click(sender As Object, e As EventArgs) Handles btnEasy.Click
        pEasy.Location = New Point(20, 150)
        pEasy.Show()
    End Sub

    Private Sub ScoringForm_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        GenerateEasyQuestion()
        GenerateMediumQuestion()
        GenerateHardQuestion()
    End Sub

    Private Sub GenerateEasyQuestion()
        Dim number1 As Integer = random.Next(1, 101)
        Dim number2 As Integer = random.Next(1, 101)
        Dim operators() As String = {"+", "-"}
        operation = operators(random.Next(0, operators.Length))

        lblEasyQuest.Text = number1 & " " & operation & " " & number2
        txtEasyAnswer.Text = ""
    End Sub

    Private Sub btnEasyCheckAns_Click(sender As Object, e As EventArgs) Handles btnEasyCheckAns.Click
        Dim answer As Integer

        If Integer.TryParse(txtEasyAnswer.Text, answer) Then
            Dim numbers() As String = lblEasyQuest.Text.Split(" "c)
            Dim number1 As Integer = Integer.Parse(numbers(0))
            Dim number2 As Integer = Integer.Parse(numbers(2))
            Dim expectedAnswer As Integer

            Select Case operation
                Case "+"
                    expectedAnswer = number1 + number2
                Case "-"
                    expectedAnswer = number1 - number2
            End Select

            If answer = expectedAnswer Then
                MessageBox.Show("Correct answer!")
                score += 1
            Else
                MessageBox.Show("Incorrect answer!")
            End If

            questionCount += 1
            lblEasyScore.Text = "Score: " & score
            lblEasyQuestCount.Text = "Question: " & questionCount

            If questionCount < 10 Then
                GenerateEasyQuestion()
            Else
                MessageBox.Show("Game over! Your score is " & score)
                Me.Close()
            End If
        Else
            MessageBox.Show("Invalid answer! Please enter a valid number.")
        End If
    End Sub

    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Me.Close()
        Form1.Show()
    End Sub


    '----------------------------------------------------------------------------------'
    '----------------------------------------------------------------------------------'
    '----------------------------------------------------------------------------------'

    Private Sub btnMedium_Click(sender As Object, e As EventArgs) Handles btnMedium.Click
        pMedium.Location = New Point(285, 150)
        pMedium.Show()
    End Sub

    Private Sub GenerateMediumQuestion()
        Dim number1 As Integer = random.Next(1, 101)
        Dim number2 As Integer = random.Next(1, 101)
        Dim operators() As String = {"+", "-", "*"}
        operation = operators(random.Next(0, operators.Length))

        lblMediumQuest.Text = number1 & " " & operation & " " & number2
        txtMediumAnswer.Text = ""
    End Sub

    Private Sub btnMediumCheckAns_Click(sender As Object, e As EventArgs) Handles btnMediumCheckAns.Click
        Dim answer As Integer

        If Integer.TryParse(txtMediumAnswer.Text, answer) Then
            Dim numbers() As String = lblMediumQuest.Text.Split(" "c)
            Dim number1 As Integer = Integer.Parse(numbers(0))
            Dim number2 As Integer = Integer.Parse(numbers(2))
            Dim expectedAnswer As Double

            Select Case operation
                Case "+"
                    expectedAnswer = number1 + number2
                Case "-"
                    expectedAnswer = number1 - number2
                Case "*"
                    expectedAnswer = number1 * number2
            End Select

            If answer = expectedAnswer Then
                MessageBox.Show("Correct answer!")
                score += 1
            Else
                MessageBox.Show("Incorrect answer!")
            End If

            questionCount += 1
            lblMediumScore.Text = "Score: " & score
            lblMediumQuestCount.Text = "Question: " & questionCount

            If questionCount < 10 Then
                GenerateMediumQuestion()
            Else
                MessageBox.Show("Game over! Your score is " & score)
                Me.Close()
            End If
        Else
            MessageBox.Show("Invalid answer! Please enter a valid number.")
        End If
    End Sub


    '----------------------------------------------------------------------------------'
    '----------------------------------------------------------------------------------'
    '----------------------------------------------------------------------------------'

    Private Sub btnHard_Click(sender As Object, e As EventArgs) Handles btnHard.Click
        pHard.Location = New Point(560, 150)
        pHard.Show()
    End Sub

    Private Sub GenerateHardQuestion()
        Dim number1 As Integer = random.Next(1, 101)
        Dim number2 As Integer = random.Next(1, 101)
        Dim operators() As String = {"+", "-", "*", "/"}
        operation = operators(random.Next(0, operators.Length))

        lblHardQuest.Text = number1 & " " & operation & " " & number2
        txtHardAnswer.Text = ""
    End Sub

    Private Sub btnHardCheckAns_Click(sender As Object, e As EventArgs) Handles btnHardCheckAns.Click
        Dim answer As Double

        If Double.TryParse(txtHardAnswer.Text, answer) Then
            Dim numbers() As String = lblHardQuest.Text.Split(" "c)
            Dim number1 As Integer = Integer.Parse(numbers(0))
            Dim number2 As Integer = Integer.Parse(numbers(2))
            Dim expectedAnswer As Double

            Select Case operation
                Case "+"
                    expectedAnswer = number1 + number2
                Case "-"
                    expectedAnswer = number1 - number2
                Case "*"
                    expectedAnswer = number1 * number2
                Case "/"
                    expectedAnswer = CDbl(number1) / number2
            End Select

            Dim tolerance As Double = 0.000001

            If answer = expectedAnswer Then
                MessageBox.Show("Correct answer!")
                score += 1
            Else
                MessageBox.Show("Incorrect answer!")
            End If

            questionCount += 1
            lblHardScore.Text = "Score: " & score
            lblHardQuestCount.Text = "Question: " & questionCount

            If questionCount < 10 Then
                GenerateHardQuestion()
            Else
                MessageBox.Show("Game over! Your score is " & score)
                Me.Close()
            End If
        Else
            MessageBox.Show("Invalid answer! Please enter a valid number.")
        End If
    End Sub

End Class
