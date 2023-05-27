Public Class AnswerForm
    Private Sub btnCalculate_Click(sender As Object, e As EventArgs) Handles btnCalculate.Click
        Dim question As String = txtQuestion.Text
        Dim answer As String = txtUserAnswer.Text

        ' Validate question and answer inputs
        If String.IsNullOrWhiteSpace(question) Or String.IsNullOrWhiteSpace(answer) Then
            MessageBox.Show("Please enter both the question and answer.")
            Return
        End If

        ' Evaluate the answer
        Dim calculatedAnswer As String = ""
        Try
            calculatedAnswer = EvaluateMathExpression(question)
        Catch ex As Exception
            MessageBox.Show("Invalid math expression.")
            Return
        End Try

        ' Display the calculated answer
        txtCorrectAnswer.Text = calculatedAnswer
    End Sub

    Private Function EvaluateMathExpression(expression As String) As String
        ' Evaluate the math expression and return the result
        Dim result As Double = New DataTable().Compute(expression, Nothing)
        Return result.ToString()
    End Function

    Private Sub btnClear_Click(sender As Object, e As EventArgs) Handles btnClear.Click
        ' Clear the input fields and the calculated answer
        txtQuestion.Text = ""
        txtUserAnswer.Text = ""
        txtCorrectAnswer.Text = ""
    End Sub

    Private Sub btnBack_Click(sender As Object, e As EventArgs) Handles btnBack.Click
        Me.Close()
        Form1.Show()
    End Sub

End Class
