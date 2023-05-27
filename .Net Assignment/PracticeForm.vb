Public Class PracticeForm

    Private random As New Random()
    Private operation As String

    Private Sub PracticeForm_Load(sender As Object, e As EventArgs) Handles MyBase.Load
        GenerateQuestion()
    End Sub

    Private Sub GenerateQuestion()
        Dim number1 As Integer = random.Next(1, 101)
        Dim number2 As Integer = random.Next(1, 101)
        Dim operators() As String = {"+", "-", "*", "/"}
        operation = operators(random.Next(0, operators.Length))

        lblQuestion.Text = number1 & " " & operation & " " & number2
        txtAnswer.Text = ""
    End Sub

    Private Sub btnCheckAnswer_Click(sender As Object, e As EventArgs) Handles btnCheckAnswer.Click
        Dim answer As Integer

        If Integer.TryParse(txtAnswer.Text, answer) Then
            Dim numbers() As String = lblQuestion.Text.Split(" "c)
            Dim number1 As Integer = Integer.Parse(numbers(0))
            Dim number2 As Integer = Integer.Parse(numbers(2))
            Dim expectedAnswer As Integer

            Select Case operation
                Case "+"
                    expectedAnswer = number1 + number2
                Case "-"
                    expectedAnswer = number1 - number2
                Case "*"
                    expectedAnswer = number1 * number2
                Case "/"
                    expectedAnswer = number1 / number2
            End Select

            MessageBox.Show("The correct answer is: " & expectedAnswer)

            GenerateQuestion()
        Else
            MessageBox.Show("Invalid answer! Please enter a valid number.")
        End If
    End Sub

    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Me.Close()
        Form1.Show()
    End Sub

End Class
